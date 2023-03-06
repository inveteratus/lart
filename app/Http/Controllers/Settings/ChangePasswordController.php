<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'old' => 'required|current_password',
            'new' => 'required|string|min:8',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['new']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
