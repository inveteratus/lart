<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[Group('routes')]
class IndexRouteTest extends TestCase
{
    #[Test]
    public function pageLoads(): void
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('index');
    }
}
