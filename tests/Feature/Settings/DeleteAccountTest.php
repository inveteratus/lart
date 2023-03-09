<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canDeleteAccount(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('settings.delete'), ['password' => 'password']);

        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);

        $response->assertRedirectToRoute('index');
    }

    /**
     * @test
     */
    public function cannotDeleteAccountWithWrongPassword(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('settings.delete'), ['password' => 'wrong-password']);

        $response->assertSessionHasErrors();
    }
}
