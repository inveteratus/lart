<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::view('', 'auth.login')
            ->name('login');
        Route::post('', LoginController::class)
            ->middleware('throttle:6,1');
    });
    Route::prefix('register')->group(function () {
        Route::view('', 'auth.register')
            ->name('register');
        Route::post('', RegisterController::class)
            ->middleware('throttle:6,1');
    });
});

Route::post('logout', LogoutController::class)
    ->name('logout');
