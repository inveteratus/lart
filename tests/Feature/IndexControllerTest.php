<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function pageLoads(): void
    {
        $response = $this->get(route('index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
