<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testPageLoads(): void
    {
        $response = $this->get(route('index'));

        $response->assertStatus(Response::HTTP_OK);
    }
}
