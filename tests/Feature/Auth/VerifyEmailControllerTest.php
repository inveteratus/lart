<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class VerifyEmailControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function pageLoads(): void
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)
            ->get(route('verification.notice'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function redirectIfAlreadyVerified(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('verification.notice'))
            ->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function canVerifyEmail(): void
    {
        $user = User::factory()->unverified()->create();

        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function redirectAfterVerifying(): void
    {
        $user = User::factory()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * @test
     */
    public function emailIsNotVerifiedWithWrongHash(): void
    {
        $user = User::factory()->unverified()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }

    /**
     * @test
     */
    public function linkIsSent(): void
    {
        Notification::fake();
        $user = User::factory()->unverified()->create();
        $response = $this->actingAs($user)->post(route('verification.send'));
        Notification::assertSentTo($user, VerifyEmail::class);
        $response->assertSessionHas(['status' => 'verification-link-sent']);
    }

    /**
     * @test
     */
    public function linkIsNotSentIfUserIsVerified(): void
    {
        Notification::fake();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('verification.send'));
        Notification::assertNothingSent();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
