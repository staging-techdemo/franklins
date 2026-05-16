<?php

namespace App\Http\Controllers\frontend;

use Stripe\Stripe;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceBooking;
use App\Http\Controllers\Controller;

class ServiceBookingController extends Controller
{
    public function checkout($slug, Request $request)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $planSlug = $request->query('plan');

        $package = \App\Models\Package::whereRaw('LOWER(REPLACE(name, " ", "")) = ?', [$planSlug])->first();

        return view('frontend.checkout.checkout', compact('service', 'package', 'planSlug'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'plan_type' => 'required|string',
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|string|max:10',
            'relationship' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'preferred_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'payment_method_id' => 'required|string',
        ]);

        $package = \App\Models\Package::whereRaw('LOWER(REPLACE(name, " ", "")) = ?', [$validated['plan_type']])->first();
        $amount = $package ? $package->amount : 0;

        if ($amount <= 0) {
            return back()->with('error', 'Invalid package or amount. Please contact support.');
        }

        $booking = ServiceBooking::create(array_merge($validated, [
            'amount' => $amount,
            'payment_status' => 'pending',
            'status' => 'pending',
            'user_id' => \Auth::id(),
        ]));

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirm' => true,
                'description' => 'Care service booking for ' . $validated['patient_name'],
                'return_url' => route('service.booking.success', ['id' => $booking->id]),
                'payment_method_types' => ['card'],
            ]);

            if ($paymentIntent->status === 'succeeded') {
                $booking->update([
                    'payment_status' => 'paid',
                    'status' => 'confirmed',
                    'stripe_session_id' => $paymentIntent->id
                ]);

                // Automatically create/update Client record
                $user = \Auth::user();
                if ($user && $user->role !== 'admin') {
                    $user->update(['role' => 'client']);
                }

                if ($user) {
                    \App\Models\Client::firstOrCreate(
                        ['user_id' => $user->id],
                        [
                            'client_custom_id' => 'C-' . rand(1000, 9999),
                            'phone' => 'N/A',
                            'region' => $booking->city . ', ' . $booking->state,
                            'care_plan' => $booking->plan_type,
                            'status' => 'Pending',
                        ]
                    );
                }

                return redirect()->route('service.booking.success', ['id' => $booking->id]);
            }

            return back()->with('error', 'Payment failed. Please try again.');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment gateway error: ' . $e->getMessage());
        }
    }

    public function success(Request $request, $id)
    {
        $booking = ServiceBooking::findOrFail($id);
        return view('frontend.thankyou.index', compact('booking'));
    }

    public function cancel($id)
    {
        $booking = ServiceBooking::findOrFail($id);
        $booking->update(['payment_status' => 'cancelled']);

        return redirect()->route('packages')->with('error', 'Payment was cancelled. You can try again whenever you are ready.');
    }
}
