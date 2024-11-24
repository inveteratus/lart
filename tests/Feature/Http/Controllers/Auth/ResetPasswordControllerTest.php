<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Str;

test('the page loads', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(route('forgot-password'), ['email' => $user->email]);

    Notification::assertSentTo([$user], ResetPassword::class, function ($notification) use ($user) {
        $this->get(route('password.reset', ['token' => $notification->token]), ['email' => $user->email])
            ->assertOk()
            ->assertViewIs('auth.reset-password')
            ->assertSee($user->email);

        return true;
    });
})->group('controllers', 'auth');

test('the password can be reset with an valid token', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(route('forgot-password'), ['email' => $user->email]);

    Notification::assertSentTo([$user], ResetPassword::class, function ($notification) use ($user) {
        $this->from(route('password.reset', ['token' => $notification->token]), ['email' => $user->email])
            ->post(route('password.reset.store'), ['token' => $notification->token, 'email' => $user->email, 'password' => 'new-password'])
            ->assertRedirect(route('login'))
            ->assertSessionHas(['status' => 'Your password has been reset.'])
            ->assertSessionHasNoErrors();

        return true;
    });

    $user->refresh();
    $this->assertTrue(Hash::check('new-password', $user->password));
})->group('controllers', 'auth');

test('the password cannot be reset with an invalid token', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(route('forgot-password'), ['email' => $user->email]);

    Notification::assertSentTo([$user], ResetPassword::class, function ($notification) use ($user) {
        $token = Str::random(40);
        $this->from(route('password.reset', ['token' => $token]), ['email' => $user->email])
            ->post(route('password.reset.store'), ['token' => $token, 'email' => $user->email, 'password' => 'new-password'])
            ->assertRedirect(route('password.reset', ['token' => $token]))
            ->assertSessionHasInput('email', $user->email)
            ->assertSessionHasErrors(['email' => 'This password reset token is invalid.']);
        return true;
    });
})->group('controllers', 'auth');
