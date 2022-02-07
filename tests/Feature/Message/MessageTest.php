<?php

namespace Tests\Feature\Message;

use App\Models\User;
use Database\Seeders\MessageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_can_be_render()
    {
        $this->seed(MessageSeeder::class);

        $this->get(route('contact'))
            ->assertOk();
    }

    public function test_user_can_not_be_render_dashboard_messages()
    {
        $this->seed(MessageSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.index'))
            ->assertForbidden();
    }

    public function test_customer_service_can_be_render_dashboard_messages()
    {
        $this->seed(MessageSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(2);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.index'))
            ->assertOk();
    }

    public function test_admin_can_be_render_dashboard_messages()
    {
        $this->seed(MessageSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.messages.index'))
            ->assertOk();
    }
}
