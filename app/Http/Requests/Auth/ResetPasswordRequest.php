<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string $password
 * @property string $token
 */
class ResetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
            'token' => 'required|string',
        ];
    }
}
