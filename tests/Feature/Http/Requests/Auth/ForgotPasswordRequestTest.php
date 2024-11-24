<?php

use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Support\Str;

test('request passes validation with :dataset', function (string $email) {
    $this->assertTrue(Validator::make([
        'email' => $email,
        'password' => 'password',
    ], (new ForgotPasswordRequest())->rules())->passes());
})->with([
    'a normal email address' => 'test@example.com',
    'a long email address' => Str::random(243) . '@example.com',
])->group('requests', 'auth');

test('request fails validation with :dataset', function (?string $email, array $errors) {
    $validator = Validator::make([
        'email' => $email,
        'password' => 'password',
    ], (new ForgotPasswordRequest())->rules());

    $this->assertTrue($validator->fails());
    $this->assertEquals($validator->errors()->toArray(), $errors);
})->with([
    'a missing email address' => [null, ['email' => ['The email field is required.']]],
    'a blank email address' => [null, ['email' => ['The email field is required.']]],
    'an incorrect email address' => ['incorrect', ['email' => ['The email field must be a valid email address.']]],
    'too long an email address' => [Str::random(244) . '@example.com', ['email' => ['The email field must not be greater than 255 characters.']]],
])->group('requests', 'auth');
