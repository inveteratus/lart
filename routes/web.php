<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(__DIR__.'/auth.php');
Route::prefix('')->group(__DIR__.'/settings.php');

Route::middleware('guest')->group(function () {
    Route::get('', IndexController::class)->name('index');
});

Route::middleware('auth')->group(function () {
    Route::get('home', HomeController::class)->name('home');
});
