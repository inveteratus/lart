<?php

use App\Http\Controllers\Settings\ChangePasswordController;
use App\Http\Controllers\Settings\DeleteAccountController;
use App\Http\Controllers\Settings\ProfileInformationController;
use App\Http\Controllers\Settings\VerifyEmailController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('settings', SettingsController::class)->name('settings');
    Route::patch('settings/update-profile', ProfileInformationController::class)->name('settings.profile');
    Route::patch('settings/change-password', ChangePasswordController::class)->name('settings.password');
    Route::post('settings/verify-email', VerifyEmailController::class)->name('settings.verify');
    Route::delete('settings/delete-account', DeleteAccountController::class)->name('settings.delete');
});
