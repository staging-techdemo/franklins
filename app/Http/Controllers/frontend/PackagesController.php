<?php

namespace App\Http\Controllers\frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    public function index(Request $request)
    {
        $selectedServiceId = $request->query('service');
        $services = Service::where('status', 'active')->get();
        $selectedService = $selectedServiceId ? Service::find($selectedServiceId) : $services->first();

        $packages = [
            [
                'name' => 'Basic Care',
                'price' => '$250',
                'duration' => '/ week',
                'features' => ['Daily companion visit', 'Light housekeeping', 'Meal preparation', 'Medication reminders'],
                'color' => '#DDEEE7',
                'text_color' => '#2E6A51',
                'popular' => false
            ],
            [
                'name' => 'Premium Care',
                'price' => '$1,200',
                'duration' => '/ month',
                'features' => ['24/7 nursing support', 'Physical therapy', 'Specialized nutrition plan', 'Transportation services', 'Full laundry care'],
                'color' => '#7E80B0',
                'text_color' => '#FFFFFF',
                'popular' => true
            ],
            [
                'name' => 'Hourly Support',
                'price' => '$35',
                'duration' => '/ hour',
                'features' => ['Flexible scheduling', 'Errand running', 'Personal hygiene care', 'Respite for family'],
                'color' => '#F6ECD9',
                'text_color' => '#8C6D3D',
                'popular' => false
            ],
        ];

        return view('frontend.packages.index', compact('services', 'selectedService', 'packages'));
    }
}
