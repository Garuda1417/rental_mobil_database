<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/showroom', function(){
    return view('page.showroom');
});

Route::get('/booking', function(){
    return view('page.booking.booking');
});

Route::get('/heritage', function(){
    return view('page.heritage');
});

Route::get('/admin', function(){
    return view('page.admin.dashboard');
});

// API routes for admin management (simple, same file for this project)
use App\Http\Controllers\AdminBookingController;
use Illuminate\Support\Facades\Route as FRoute;

FRoute::get('/api/admin/bookings', [AdminBookingController::class, 'index']);
FRoute::post('/api/admin/bookings', [AdminBookingController::class, 'store']);
FRoute::patch('/api/admin/bookings/{booking}', [AdminBookingController::class, 'update']);
FRoute::delete('/api/admin/bookings/{booking}', [AdminBookingController::class, 'destroy']);