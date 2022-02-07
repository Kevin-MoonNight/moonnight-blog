<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_deleted_message()
    {
        $message = Message::factory()->create();

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->delete(route('dashboard.messages.destroy', ['message' => $message->getAttribute('id')]))
            ->assertForbidden();
    }

    public function test_customer_services_can_be_deleted_message()
    {
        $message = Message::factory()->create();

        $user = User::factory()->create();
        $user->roles()->attach(2);
        $this->actingAs($user);

        $this->delete(route('dashboard.messages.destroy', ['message' => $message->getAttribute('id')]))
            ->assertRedirect(route('dashboard.messages.index'));;

        $this->assertDeleted($message);
    }
}
