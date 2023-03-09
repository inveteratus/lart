<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canChangePassword(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('settings.password'), [
            'old' => 'password',
            'new' => 'password',
        ]);

        $response->assertSessionHas(['status' => 'password-updated']);
    }

    /**
     * @test
     */
    public function cannotChangePasswordWithWrongPassword(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('settings.password'), [
            'old' => 'wrong-password',
            'new' => 'password',
        ]);

        $response->assertSessionHasErrors();
    }
}
