<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Employee\EmployeeController;
use App\Http\Controllers\Admin\Request\ClientRequestController;
use App\Http\Controllers\Admin\Dashboard\AdminHomePageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;

// Auth Controllers
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Employee Controllers
use App\Http\Controllers\Employee\Dashboard\EmployeeHomePageController;

// Frontend Controllers
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\BlogsController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\frontend\BlogDetailController;
use App\Http\Controllers\frontend\ServiceDetailController;

// Root route - Login Page
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/blog/{slug}', [BlogDetailController::class, 'index'])->name('blog-detail');
Route::get('/service/{slug}', [ServiceDetailController::class, 'index'])->name('service-detail');

// Admin routes (only for authenticated admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminHomePageController::class, 'index'])->name('admin.dashboard');

    Route::resource('/dashboard/clients', ClientController::class)->names('admin.clients');

    Route::resource('/dashboard/employees', EmployeeController::class)->names('admin.employees');
    Route::get('/dashboard/attendance', [AdminHomePageController::class, 'attendance'])->name('admin.attendance');
    Route::get('/dashboard/payments', [AdminHomePageController::class, 'payments'])->name('admin.payments');
    Route::get('/dashboard/outdoor', [AdminHomePageController::class, 'outdoor'])->name('admin.outdoor');

    Route::get('/dashboard/requests', [ClientRequestController::class, 'index'])->name('admin.requests.index');
    Route::put('/dashboard/requests/{clientRequest}/status', [ClientRequestController::class, 'updateStatus'])->name('admin.requests.updateStatus');
    Route::get('/dashboard/complaints', [AdminHomePageController::class, 'complaints'])->name('admin.complaints');
    Route::get('/dashboard/notifications', [AdminHomePageController::class, 'notifications'])->name('admin.notifications');
    Route::get('/dashboard/reports', [AdminHomePageController::class, 'reports'])->name('admin.reports');

    // Dynamic Content Routes
    Route::resource('/dashboard/services', ServiceController::class)->names('admin.services');
    Route::resource('/dashboard/blogs', BlogController::class)->names('admin.blogs');
    Route::resource('/dashboard/categories', CategoryController::class)->names('admin.categories');

    // Tag API routes (used for inline tag creation on blog forms)
    Route::post('/dashboard/tags', [TagController::class, 'store'])->name('admin.tags.store');
    Route::delete('/dashboard/tags/{tag}', [TagController::class, 'destroy'])->name('admin.tags.destroy');

    // Setting routes
    Route::get('/dashboard/setting', [SettingController::class, 'index'])->name('admin.container.setting.index');
    Route::put('/dashboard/setting/{id}', [SettingController::class, 'update'])->name('admin.container.setting.update');
    Route::delete('/dashboard/setting/session/{id}', [SettingController::class, 'logoutSession'])->name('admin.setting.logout-session');
});

// Employee routes (only for authenticated employees)
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/employee-dashboard', [EmployeeHomePageController::class, 'index'])->name('employee.dashboard');
    Route::get('/employee-dashboard/clients', [EmployeeHomePageController::class, 'clients'])->name('employee.clients.index');
    Route::get('/employee-dashboard/attendance', [EmployeeHomePageController::class, 'attendance'])->name('employee.attendance');
    Route::get('/employee-dashboard/outdoor', [EmployeeHomePageController::class, 'outdoor'])->name('employee.outdoor');
    Route::get('/employee-dashboard/requests', [EmployeeHomePageController::class, 'requests'])->name('employee.requests.index');
    Route::get('/employee-dashboard/notifications', [EmployeeHomePageController::class, 'notifications'])->name('employee.notifications');
    Route::get('/employee-dashboard/setting', [EmployeeHomePageController::class, 'setting'])->name('employee.container.setting.index');
    Route::put('/employee-dashboard/setting/{id}', [EmployeeHomePageController::class, 'updateSetting'])->name('employee.container.setting.update');
    Route::delete('/employee-dashboard/setting/session/{id}', [EmployeeHomePageController::class, 'logoutSession'])->name('employee.setting.logout-session');
});

// Client routes (only for authenticated clients)
Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/client-dashboard', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'index'])->name('client.dashboard');
    Route::get('/client-dashboard/requests', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'requests'])->name('client.requests.index');
    Route::get('/client-dashboard/care-plan', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'carePlan'])->name('client.care-plan');
    Route::get('/client-dashboard/notifications', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'notifications'])->name('client.notifications');
    Route::get('/client-dashboard/setting', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'setting'])->name('client.container.setting.index');
    Route::put('/client-dashboard/setting/{id}', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'updateSetting'])->name('client.container.setting.update');
    Route::delete('/client-dashboard/setting/session/{id}', [\App\Http\Controllers\Client\Dashboard\ClientHomePageController::class, 'logoutSession'])->name('client.setting.logout-session');
});

require __DIR__ . '/auth.php';
