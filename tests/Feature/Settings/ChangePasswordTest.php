<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function testCanChangePassword(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('settings.password'), [
            'current' => 'password',
            'password' => 'password',
        ]);

        $response->assertSessionHas(['status' => 'password-updated']);
    }

    public function testCannotChangePasswordWithWrongPassword(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('settings.password'), [
            'current' => 'wrong-password',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors();
    }
}
