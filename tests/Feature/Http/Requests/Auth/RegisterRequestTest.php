<?php

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;

test('request passes validation with :dataset', function (string $name, string $email, string $password) {
    $this->assertTrue(Validator::make([
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ], (new RegisterRequest())->rules())->passes());
})->with([
    'valid details' => ['Test', 'test@example.com', 'password'],
    'long email address' => ['Test', Str::random(243) . '@example.com', 'password'],
])->group('requests', 'auth');

test('request fails validation with :dataset', function (?string $name, ?string $email, ?string $password, array $errors) {
    User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    $validator = Validator::make([
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ], (new RegisterRequest())->rules());

    $this->assertTrue($validator->fails());
    $this->assertEquals($validator->errors()->toArray(), $errors);
})->with([
    'an empty name' => ['', 'good@example.com', 'password', ['name' => ['The name field is required.']]],
    'an empty email' => ['Test', '', 'password', ['email' => ['The email field is required.']]],
    'a missing name' => [null, 'good@example.com', 'password', ['name' => ['The name field is required.']]],
    'a missing email' => ['Test', null, 'password', ['email' => ['The email field is required.']]],
    'too long a name' => [Str::random(256), 'good@example.com', 'password', ['name' => ['The name field must not be greater than 255 characters.']]],
    'an invalid email' => ['Test', 'invalid', 'password', ['email' => ['The email field must be a valid email address.']]],
    'an empty password' => ['Test', 'good@example.com', '', ['password' => ['The password field is required.']]],
    'an existing email' => ['Test', 'test@example.com', 'password', ['email' => ['The email has already been taken.']]],
    'a missing password' => ['Test', 'good@example.com', null, ['password' => ['The password field is required.']]],
    'too short a password' => ['Test', 'good@example.com', 'short', ['password' => ['The password field must be at least 8 characters.']]],
    'too long an email address' => ['Test', Str::random(244) . '@example.com', 'password', ['email' => ['The email field must not be greater than 255 characters.']]],
])->group('requests', 'auth');
