<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\MessageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_messages_can_be_get()
    {
        $this->seed(MessageSeeder::class);

        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $this->get(route('messages.index'))
            ->assertOk();
    }
}
