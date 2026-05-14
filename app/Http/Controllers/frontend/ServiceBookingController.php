<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceBooking;
use Illuminate\Http\Request;

class ServiceBookingController extends Controller
{
    public function checkout($slug, Request $request)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $plan = $request->query('plan', 'monthly');
        
        return view('frontend.services.checkout', compact('service', 'plan'));
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
        ]);

        ServiceBooking::create($validated);

        return redirect()->route('home')->with('success', 'Care request submitted! Our specialist will contact you shortly to confirm the setup.');
    }
}
