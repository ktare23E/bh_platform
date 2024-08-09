<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BoardingHouseController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Landlord\LandlordDashboard;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landlord\LandLordBoardingHouseController;
use App\Http\Controllers\Landlord\LandLordReport;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/map', function () {
    return view('map');
})->name('map');


Route::post('/register_store',[LoginController::class,'registerStore'])->name('register_store');




Route::post('/logout',[LoginController::class,'logout'])->name('logout');


Route::post('login_store',[LoginController::class,'login'])->name('login_store');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['checkUserType:admin'])->group(function(){
        Route::get('/admin_dashboard',[AdminDashboardController::class,'index'])->name('admin_dashboard');


        Route::get('/users',[UserController::class,'index'])->name('users');


        Route::get('/requirements',[RequirementController::class,'index'])->name('requirements');
        Route::post('/store_requirement',[RequirementController::class,'store'])->name('store_requirement');
        Route::post('/update_requirement',[RequirementController::class,'update'])->name('update_requirement');


        Route::get('/boarding_house',[BoardingHouseController::class,'index'])->name('boarding_house');
        Route::get('/view_boarding_house/{boarding_house}',[BoardingHouseController::class,'view'])->name('view_boarding_house');
        Route::post('/approve_requirement_submission',[BoardingHouseController::class,'approveRequirementSubmission'])->name('approve_requirement_submission');
        Route::post('/reject_requirement_submission',[BoardingHouseController::class,'rejectRequirementSubmission'])->name('reject_requirement_submission');
    });


    Route::middleware(['checkUserType:landlord'])->group(function(){
        Route::get('/landlord',[LandlordDashboard::class,'index'])->name('landlord_dashboard');
        Route::get('/landlord_profile',[LandlordDashboard::class,'profile'])->name('landlord_profile');

        Route::get('/landlord_boarding_house',[LandLordBoardingHouseController::class,'index'])->name('landlord_boarding_house');
        Route::post('/store_boarding_house',[LandLordBoardingHouseController::class,'store'])->name('store_boarding_house');

        Route::get('/boarding_house_images/{boarding_house}',[LandLordBoardingHouseController::class,'images'])->name('boarding_house_images');

        Route::get('/boarding_house_requirement_submissions/{boarding_house}',[LandLordBoardingHouseController::class,'viewBoardingHouse'])->name('boarding_house_requirement_submissions');

        Route::get('/reports',[LandLordReport::class,'index'])->name('reports');
    });
    
});