<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_show()
    {
        $message = Message::factory()->create();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(route('messages.show', ['message' => $message->id]))
            ->assertStatus(200);

        $this->assertEquals($message->id , $response->json('id'));
    }
}
