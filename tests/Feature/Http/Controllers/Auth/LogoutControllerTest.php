<?php

use App\Models\User;

test('logout operates correctly', function () {
    $user = User::factory()->create(['name' => 'Test', 'email' => 'test@example.com', 'password' => 'password']);
    $this->actingAs($user)
        ->post(route('logout'))
        ->assertRedirect(route('index'))
        ->assertSessionHasNoErrors();
    $this->assertGuest();
})->group('controllers', 'auth');
