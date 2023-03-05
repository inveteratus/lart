<?php

namespace tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function testPageLoads(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.recovery'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
            $response = $this->get(route('password.reset', [
                'token' => $notification->token,
            ]));

            $response->assertStatus(Response::HTTP_OK);

            return true;
        });
    }

    public function testCanResetPassword(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.recovery'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            $response = $this->post(route('password.reset.store'), [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }

    public function testCannotResetPasswordWithWrongToken(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.recovery'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            $response = $this->post(route('password.reset.store'), [
                'token' => 'wrong-token',
                'email' => $user->email,
                'password' => 'password',
            ]);

            $response->assertSessionHasErrors();

            return true;
        });
    }

    public function testCannotResetPasswordWithWrongEmail(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.recovery'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
            $response = $this->post(route('password.reset.store'), [
                'token' => $notification->token,
                'email' => 'wrong@example.com',
                'password' => 'password',
            ]);

            $response->assertSessionHasErrors();

            return true;
        });
    }
}
