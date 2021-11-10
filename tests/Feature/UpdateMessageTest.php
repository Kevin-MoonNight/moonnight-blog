<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_updated()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $message = Message::factory()->create();

        $message->setAttribute('name', 'test2');
        $this->put(route('messages.update', ['message' => $message->getAttribute('id')]), $message->getAttributes())
            ->assertOk();

        $this->assertEquals($message->getAttribute('name'), $message->fresh()->getAttribute('name'));
    }
}
