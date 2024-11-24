<?php

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;

test('the page loads', function () {
    $this->get(route('register'))
        ->assertOk()
        ->assertViewIs('auth.register');
})->group('controllers', 'auth');

test('we can register a new account', function () {
    Notification::fake();
    $this->from(route('register'))
        ->post(route('register'), ['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password'])
        ->assertRedirect(route('index'))
        ->assertSessionHasNoErrors();
    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', ['name' => 'Test', 'email' => 'test@example.com']);
    $user = User::where('email', 'test@example.com')->first();
    Notification::assertSentTo($user, VerifyEmail::class);
})->group('controllers', 'auth');

test('we cannot register an account that already exists', function () {
    User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    $this->from(route('register'))
        ->post(route('register'), ['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password'])
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors(['email' => 'The email has already been taken.']);
    $this->assertGuest();
})->group('controllers', 'auth');

test('cannot register when rate limited', function () {
    User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    for ($i = 0; $i < 6; $i++) {
        $this->from(route('register'))
            ->post(route('register'), ['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password'])
            ->assertRedirect(route('register'))
            ->assertSessionHasErrors(['email' => 'The email has already been taken.']);
    }
    $this->from(route('register'))
        ->post(route('register'), ['name' => 'Test', 'email' => 'good@example.com', 'password' => 'password'])
        ->assertStatus(429);
    $this->assertGuest();
})->group('controllers', 'auth');
