<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordRecoveryController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::view('', 'index')->name('index');
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('password/recovery', [PasswordRecoveryController::class, 'create'])->name('password.recovery');
    Route::post('password/recovery', [PasswordRecoveryController::class, 'store']);
    Route::get('password/reset', [PasswordResetController::class, 'create'])->name('password.reset');
    Route::post('password/reset', [PasswordResetController::class, 'store']);
});

Route::post('logout', [LogoutController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('home', 'home')->name('home');
});
