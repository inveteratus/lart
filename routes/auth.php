<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordRecoveryController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('password/recovery', [PasswordRecoveryController::class, 'create'])->name('password.recovery');
    Route::post('password/recovery', [PasswordRecoveryController::class, 'store']);
    Route::get('password/reset/{token}', [PasswordResetController::class, 'create'])->name('password.reset');
    Route::post('password/reset', [PasswordResetController::class, 'store'])->name('password.reset.store');
});

Route::post('logout', [LogoutController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::get('email/verify', [VerifyEmailController::class, 'create'])
        ->name('verification.notice');
    Route::post('email/verify', [VerifyEmailController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
