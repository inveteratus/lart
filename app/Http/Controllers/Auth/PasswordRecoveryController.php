<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordRecoveryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordRecoveryController extends Controller
{
    public function create(): View
    {
        return view('auth.password-recovery');
    }

    public function store(PasswordRecoveryRequest $request): RedirectResponse
    {
        Password::sendResetLink(
            $request->only('email')
        );

        return to_route('login')->with(['status' => __(Password::RESET_LINK_SENT)]);
    }
}
