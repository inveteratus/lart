<?php

use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Str;

test('request passes validation with :dataset', function (string $email) {
    $this->assertTrue(Validator::make([
        'email' => $email,
        'password' => 'password',
        'token' => Str::random(60),
    ], (new ResetPasswordRequest())->rules())->passes());
})->with([
    'a normal email address' => 'test@example.com',
    'a long email address' => Str::random(243) . '@example.com',
])->group('requests', 'auth');

test('request fails validation with :dataset', function (?string $email, ?string $password, ?string $token, array $errors) {
    $validator = Validator::make([
        'email' => $email,
        'password' => $password,
        'token' => $token,
    ], (new ResetPasswordRequest())->rules());
    $this->assertTrue($validator->fails());
    $this->assertEquals($errors, $validator->errors()->toArray());
})->with([
    'missing email' => [null, 'password', Str::random(40), ['email' => ['The email field is required.']]],
    'blank email' => ['', 'password', Str::random(40), ['email' => ['The email field is required.']]],
    'invalid email' => ['invalid', 'password', Str::random(40), ['email' => ['The email field must be a valid email address.']]],
    'missing password' => ['test@example.com', null, Str::random(40), ['password' => ['The password field is required.']]],
    'blank password' => ['test@example.com', '', Str::random(40), ['password' => ['The password field is required.']]],
    'missing token' => ['test@example.com', 'password', null, ['token' => ['The token field is required.']]],
    'blank token' => ['test@example.com', 'password', '', ['token' => ['The token field is required.']]],
])->group('requests', 'auth');
