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