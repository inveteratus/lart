<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::view('', 'auth.login')->name('login');
        Route::post('', LoginController::class)->middleware(['throttle:6,1']);
    });
    Route::prefix('register')->group(function () {
        Route::view('', 'auth.register')->name('register');
        Route::post('', RegisterController::class)->middleware(['throttle:6,1']);
    });
    Route::prefix('password/recovery')->group(function () {
        Route::view('', 'auth.forgot-password')->name('forgot-password');
        Route::post('', ForgotPasswordController::class);
    });
    Route::prefix('password/reset')->group(function () {
        Route::view('{token}', 'auth.reset-password')->name('password.reset');
        Route::post('', ResetPasswordController::class)->name('password.reset.store');
    });
});

Route::post('logout', LogoutController::class)->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->name('verification.verify')
        ->middleware(['signed', 'throttle:6,1']);
});
