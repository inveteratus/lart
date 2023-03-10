<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteAccountController
{
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required|current_password',
        ]);

        $user = $request->user();

        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return to_route('index');
    }
}
