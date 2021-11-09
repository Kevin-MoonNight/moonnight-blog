<?php

namespace Tests\Feature;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_created()
    {
        $message = Message::factory(['email' => 'test@example.com'])->make();

        $this->post(route('messages.store'), $message->getAttributes())
            ->assertCreated();

        $this->assertDatabaseCount('messages', 1);
        $this->assertDatabaseHas('messages', [
            'email' => $message->getAttribute('email')
        ]);
    }
}
