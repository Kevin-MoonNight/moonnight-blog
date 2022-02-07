<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateMessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_render_edit()
    {
        $message = Message::factory(['name' => 'test'])->create();

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.edit', ['message' => $message->getAttribute('id')]))
            ->assertForbidden();
    }

    public function test_user_can_not_be_updated_message()
    {
        $message = Message::factory(['name' => 'test'])->create();

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $message->name = 'test2';

        $this->put(route('dashboard.messages.update', ['message' => $message->getAttribute('id')]), $message->getAttributes())
            ->assertForbidden();

        $this->assertNotEquals($message->getAttribute('name'), $message->fresh()->getAttribute('name'));
    }

    public function test_customer_service_can_not_render_edit()
    {
        $message = Message::factory(['name' => 'test'])->create();

        $user = User::factory()->create();
        $user->roles()->attach(2);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.edit', ['message' => $message->getAttribute('id')]))
            ->assertOk();
    }

    public function test_customer_services_can_be_updated_message()
    {
        $message = Message::factory(['name' => 'test'])->create();

        $user = User::factory()->create();
        $user->roles()->attach(2);
        $this->actingAs($user);

        $message->name = 'test2';

        $this->put(route('dashboard.messages.update', ['message' => $message->getAttribute('id')]), $message->getAttributes())
            ->assertRedirect(route('dashboard.messages.index'));

        $this->assertEquals($message->getAttribute('name'), $message->fresh()->getAttribute('name'));
    }
}
