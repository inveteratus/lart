<?php

namespace tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function pageLoads(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function canLogin(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function cannotLoginWithWrongEmail(): void
    {
        $this->post(route('login'), [
            'email' => 'wrong@example.com',
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    /**
     * @test
     */
    public function cannotLoginWithWrongPassword(): void
    {
        $user = User::factory()->create();

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
