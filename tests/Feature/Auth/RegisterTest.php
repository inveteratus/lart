<?php

namespace tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function pageLoads(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function canRegister(): void
    {
        Notification::fake();

        $response = $this->post(route('register'), [
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

        $user = User::query()->where('email', 'test@example.com')->first();

        Notification::assertSentTo($user, VerifyEmail::class);
    }

    /**
     * @test
     */
    public function cannotRegisterWithExistingEmail(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('register'), [
            'name' => 'Test',
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
    }
}
