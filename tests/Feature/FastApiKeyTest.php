<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FastApiKeyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testFailsWithoutApiKey(): void
    {
        $response = $this->postJson('/api/v1/employees');

        $response->assertStatus(403);
    }

    public function testFailsWithWrongApiKey(): void
    {
        $response = $this->postJson('/api/v1/employees', [], [
            'X-API-Key' => 'a-wrong-key'
        ]);

        $response->assertStatus(403);
    }

    public function testSucceedWithCorrectApiKey(): void
    {
        $response = $this->postJson('/api/v1/employees',
            [
                'name' => 'mohamed',
                'email' => 'mohamed12@gmail.com',
                'password' => '1234567890'
            ],
            [
            'X-API-Key' => config('app.fast_api_key')
        ]);

        $response->assertStatus(201);
    }
}
