<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ShowMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_can_be_show()
    {
        $message = Message::factory()->create();

        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $response = $this->get(route('messages.show', ['message' => $message->getAttribute('id')]))
            ->assertOk();

        $this->assertEquals($message->getAttribute('id'), $response->json('id'));
    }
}
