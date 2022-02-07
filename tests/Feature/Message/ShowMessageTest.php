<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_show_message()
    {
        $message = Message::factory()->create();

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.show', ['message' => $message->getAttribute('id')]))
            ->assertForbidden();
    }

    public function test_customer_services_can_be_show_message()
    {
        $message = Message::factory()->create();

        $user = User::factory()->create();
        $user->roles()->attach(2);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.show', ['message' => $message->getAttribute('id')]))
            ->assertOk();
    }
}
