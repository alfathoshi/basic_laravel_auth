<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (auth()->check()) { 
        return redirect('/dashboard');
    }
    return view('login.index'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});


Route::get('/showRegister', [AuthController::class, 'showRegister']); // Show Register Form
Route::post('/register', [AuthController::class, 'register']); // Handle Register

Route::get('/showLogin', [AuthController::class, 'showLogin']); // Show Login Form
Route::post('/login', [AuthController::class, 'login']); // Handle Login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/showForgotPassword', [AuthController::class, 'showForgotPassword'])->name('forgot-password');
Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);


Route::get('/forgotPassword', function () {
    return view('forgot_password.index');
})->name('forgotPassword');

Route::post('/forgotPassword', [AuthController::class, 'findEmail']);

