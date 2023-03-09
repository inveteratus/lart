<?php

namespace tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class PasswordRecoveryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function pageLoads(): void
    {
        $response = $this->get(route('password.recovery'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function sendsEmail(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post(route('password.recovery'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /**
     * @test
     */
    public function doesntSendEmailToUnknownUser(): void
    {
        Notification::fake();

        $this->post(route('password.recovery'), ['email' => 'unknown@example.com']);

        Notification::assertNothingSent();
    }
}
