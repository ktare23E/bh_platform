<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BoardingHouseController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\UserController;
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





Route::post('/logout',[LoginController::class,'logout'])->name('logout');


Route::post('login_store',[LoginController::class,'login'])->name('login_store');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['checkUserType:admin'])->group(function(){
        Route::get('/admin_dashboard',[AdminDashboardController::class,'index'])->name('admin_dashboard');


        Route::get('/users',[UserController::class,'index'])->name('users');


        Route::get('/requirements',[RequirementController::class,'index'])->name('requirements');
        Route::post('/store_requirement',[RequirementController::class,'store'])->name('store_requirement');


        Route::get('/boarding_house',[BoardingHouseController::class,'index'])->name('boarding_house');
    });
    
});