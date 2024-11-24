<?php

use App\Models\User;
use Illuminate\Support\Facades\URL;

test('can verify email', function () {
    $user = User::factory()->unverified()->create();
    $url = URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), [
        'id' => $user->id,
        'hash' => sha1($user->email),
    ]);

    $this->actingAs($user)
        ->get($url)
        ->assertRedirect(route('index'));

    $user->refresh();

    $this->assertTrue($user->hasVerifiedEmail());
});
