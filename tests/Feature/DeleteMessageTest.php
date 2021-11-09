<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_created()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $message = Message::factory()->create();

        $this->delete(route('messages.destroy', ['message' => $message->getAttribute('id')]))
            ->assertOk();
    }
}
