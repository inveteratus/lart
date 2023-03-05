<?php

namespace tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function testCanChangeName(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('settings.profile'), [
            'name' => 'Other Name',
            'email' => $user->email,
        ]);

        $response->assertSessionHas(['status' => 'profile-updated']);
        $this->assertDatabaseHas('users', ['email' => $user->email, 'name' => 'Other Name']);
    }

    public function testCanChangeEmail(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch(route('settings.profile'), [
            'name' => $user->name,
            'email' => 'other@gmail.com',
        ]);

        $response->assertSessionHas(['status' => 'profile-updated']);
        $this->assertDatabaseHas('users', ['email' => 'other@gmail.com', 'email_verified_at' => null]);
    }
}
