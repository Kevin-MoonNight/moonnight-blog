<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_created()
    {
        $message = [
            'name' => 'test',
            'email' => 'test@example.com',
            'remark' => '',
            'caseType' => '演算法'
        ];

        $this->post(route('messages.store'), $message)
            ->assertStatus(201);


        $this->assertDatabaseCount('messages', 1);
        $this->assertDatabaseHas('messages', [
            'email' => 'test@example.com'
        ]);
    }
}
