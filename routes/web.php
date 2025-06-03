<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\ServiceRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Guest Routes
    Route::resource('guests', GuestController::class);

    // Service Request Routes
    Route::resource('service_requests', ServiceRequestController::class);

    // Optional: Custom status update route for service requests
    Route::patch('/service-requests/{id}/status', [ServiceRequestController::class, 'updateStatus'])
    ->name('service_requests.update_status');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
