<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_updated()
    {
        $message = Message::factory()->create();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->put(route('messages.update', ['message' => $message->id]), [
                'name' => 'test2',
                'email' => 'test@example.com',
                'remark' => '',
                'caseType' => '演算法'
            ])
            ->assertStatus(200);

        $this->assertEquals('test2', $message->fresh()->name);
    }
}
