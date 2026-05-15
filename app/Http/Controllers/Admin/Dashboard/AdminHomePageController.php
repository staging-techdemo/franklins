<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use App\Models\Client;
use App\Models\ServiceBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminHomePageController extends Controller
{
   public function index()
   {
      $stats = [
         'total_clients' => Client::count(),
         'specialists' => User::where('role', 'employee')->count(),
         'pending_requests' => ServiceBooking::where('status', 'pending')->count(),
         'monthly_revenue' => ServiceBooking::where('payment_status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->sum('amount'),
         'active_duty' => 10, // Static for now as it needs a specialized attendance system
      ];

      // Growth calculation (comparing this month to last month)
      $lastMonthClients = Client::whereMonth('created_at', now()->subMonth()->month)->count();
      $stats['client_growth'] = $lastMonthClients > 0 
         ? round((($stats['total_clients'] - $lastMonthClients) / $lastMonthClients) * 100) 
         : 100;

      $recentActivities = ServiceBooking::with('service')
         ->latest()
         ->take(5)
         ->get();

      return view('admin.container.home.dashboard', [
         'title' => "Admin Dashboard – Franklin's Forever Care",
         'stats' => $stats,
         'recentActivities' => $recentActivities,
      ]);
   }

   public function employees()
   {
      return view('admin.container.employees.index');
   }

   public function attendance()
   {
      return view('admin.container.attendance.index');
   }

   public function payments()
   {
      return view('admin.container.payments.index');
   }

   public function outdoor()
   {
      return view('admin.container.outdoor.index');
   }

   public function requests()
   {
      return view('admin.container.requests.index');
   }

   public function complaints()
   {
      return view('admin.container.complaints.index');
   }

   public function notifications()
   {
      return view('admin.container.notifications.index');
   }

   public function reports()
   {
      return view('admin.container.reports.index');
   }
}
