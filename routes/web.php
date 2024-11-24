<?php

use Illuminate\Support\Facades\Route;

Route::prefix('')->group(__DIR__ . '/auth.php');
Route::view('/', 'index')->name('index');
