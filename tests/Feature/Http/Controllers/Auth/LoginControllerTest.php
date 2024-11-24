<?php

use App\Models\User;

test('the page loads', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertViewIs('auth.login');
})->group('controllers', 'auth');

test('can login with a valid user account', function () {
    User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    $this->from(route('login'))
        ->post(route('login'), ['email' => 'test@example.com', 'password' => 'password'])
        ->assertRedirect(route('index'))
        ->assertSessionHasNoErrors();
    $this->assertAuthenticated();
})->group('controllers', 'auth');

test('cannot login with :dataset', function (string $email, string $password) {
    User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    $this->from(route('login'))
        ->post(route('login'), ['email' => 'incorrect@example.com', 'password' => 'password'])
        ->assertRedirect(route('login'))
        ->assertSessionHasErrors(['email' => 'Invalid credentials.']);
    $this->assertGuest();
})->with([
    'an incorrect email address' => ['incorrect@example.com', 'password'],
    'an incorrect password' => ['text@example.com', 'incorrect'],
    'an unknown user' => ['test@test.com', 'incorrect'],
])->group('controllers', 'auth');

test('cannot login when rate limited', function () {
    User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    for ($i = 0; $i < 6; $i++) {
        $this->from(route('login'))
            ->post(route('login'), ['email' => 'incorrect@example.com', 'password' => 'password'])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors(['email' => 'Invalid credentials.']);
    }
    $this->from(route('login'))
        ->post(route('login'), ['email' => 'test@example.com', 'password' => 'password'])
        ->assertStatus(429);
    $this->assertGuest();
})->group('controllers', 'auth');
