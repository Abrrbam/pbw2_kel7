<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuestController;

// Landing Page
Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');

// Admin Dashboard
Route::get('/telkozy', function () {
    return view('admin/dashboard');
});

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

// Forgot Password
Route::get('/forgot-password', function () {
    return view('forgot_password');
})->name('forgot-password');

Route::post('/send_password_reset', [ForgotPasswordController::class, 'sendResetLinkEmail']);

// Register
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register']);

// Beranda Pencari
Route::get('/beranda_pencari', function () {
    return view('beranda_pencari');
});

// Home Page
Route::get('/home', [GuestController::class, 'index'])->name('home');