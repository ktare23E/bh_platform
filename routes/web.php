<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/requirements', function () {
    return view('admin.requirements.index');
})->name('requirements');

Route::get('/users', function () {
    return view('admin.users');
})->name('users');

Route::get('/boarding_house', function () {
    return view('admin.boarding_house');
})->name('boarding_house');


Route::post('login_store',[LoginController::class,'login'])->name('login_store');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['checkUserType:admin'])->group(function(){
        Route::get('/admin_dashboard',[AdminDashboardController::class,'index'])->name('admin_dashboard');


    });
    
});