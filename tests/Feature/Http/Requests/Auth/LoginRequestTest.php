<?php

use App\Http\Requests\Auth\LoginRequest;

test('request passes validation with :dataset', function (string $email) {
    $this->assertTrue(Validator::make([
        'email' => $email,
        'password' => 'password',
    ], (new LoginRequest())->rules())->passes());
})->with([
    'a normal email address' => 'test@example.com',
])->group('requests', 'auth');

test('request fails validation with :dataset', function (?string $email, ?string $password, array $errors) {
    $validator = Validator::make([
        'email' => $email,
        'password' => $password,
    ], (new LoginRequest())->rules());

    $this->assertTrue($validator->fails());
    $this->assertEquals($validator->errors()->toArray(), $errors);
})->with([
    'no password' => ['test@example.com', null, ['password' => ['The password field is required.']]],
    'no email address' => [null, 'password', ['email' => ['The email field is required.']]],
    'an empty password' => ['test@example.com', '', ['password' => ['The password field is required.']]],
    'an empty email address' => ['', 'password', ['email' => ['The email field is required.']]],
    'an invalid email address' => ['invalid', 'password', ['email' => ['The email field must be a valid email address.']]],
])->group('requests', 'auth');
