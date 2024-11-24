<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;

test('the page loads', function () {
    $this->get(route('forgot-password'))
        ->assertOk()
        ->assertViewIs('auth.forgot-password');
})->group('controllers', 'auth');

test('send and email to an existing user', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->from(route('forgot-password'))
        ->post(route('forgot-password'), ['email' => $user->email])
        ->assertRedirect(route('forgot-password'))
        ->assertSessionHas('status', 'A password reset link has been emailed to you.')
        ->assertSessionHasInput(['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class);
})->group('controllers', 'auth');

test('doesn\'t send any email to a non-existent user', function () {
    Notification::fake();

    $email = fake()->safeEmail();

    $this->from(route('forgot-password'))
        ->post(route('forgot-password'), ['email' => $email])
        ->assertRedirect(route('forgot-password'))
        ->assertSessionHas('status', 'A password reset link has been emailed to you.')
        ->assertSessionHasInput(['email' => $email]);

    Notification::assertNothingSent();
})->group('controllers', 'auth');
