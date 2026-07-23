<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminCarController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/showroom', function(){
    return view('page.showroom');
});

Route::get('/booking', function(){
    return view('page.booking.booking');
});

// Booking Store Route (hidden from user)
Route::post('/bookings/store', [AdminBookingController::class, 'storeFromBooking']);

Route::get('/heritage', function(){
    return view('page.heritage');
});

Route::get('/booking/success', function(){
    return view('page.booking.success');
});

Route::get('/admin', function(){
    return view('page.admin.dashboard');
});

// API routes for admin management (simple, same file for this project)
use Illuminate\Support\Facades\Route as FRoute;

// Booking Management APIs
FRoute::get('/api/admin/bookings', [AdminBookingController::class, 'index']);
FRoute::post('/api/admin/bookings', [AdminBookingController::class, 'store']);
FRoute::get('/api/admin/bookings/{booking}', [AdminBookingController::class, 'show']);
FRoute::patch('/api/admin/bookings/{booking}', [AdminBookingController::class, 'update']);
FRoute::delete('/api/admin/bookings/{booking}', [AdminBookingController::class, 'destroy']);

// Car Management APIs
FRoute::get('/api/admin/cars', [AdminCarController::class, 'index']);
FRoute::post('/api/admin/cars', [AdminCarController::class, 'store']);
FRoute::get('/api/admin/cars/{car}', [AdminCarController::class, 'show']);
FRoute::patch('/api/admin/cars/{car}', [AdminCarController::class, 'update']);
FRoute::delete('/api/admin/cars/{car}', [AdminCarController::class, 'destroy']);
FRoute::post('/api/admin/showrooms', [AdminCarController::class, 'storeShowroom']);
FRoute::get('/api/admin/showrooms', [AdminCarController::class, 'getShowrooms']);