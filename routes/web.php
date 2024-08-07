<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/requirements', function () {
    return view('admin.requirements.index');
})->name('requirements');

Route::get('/users', function () {
    return view('admin.users');
})->name('users');

Route::get('/boarding_house', function () {
    return view('admin.boarding_house');
})->name('boarding_house');
