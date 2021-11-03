<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_created()
    {
        $message = Message::factory()->create();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->delete(route('messages.destroy', ['message' => $message->id]))
            ->assertStatus(200);
    }
}
