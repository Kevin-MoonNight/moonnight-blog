<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ShowUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_show()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->get(route('users.show', ['user' => $user->getAttribute('id')]))
            ->assertOk();

        $this->assertEquals($user->getAttribute('username'), $response->json('username'));
    }

    public function test_user_can_not_be_show()
    {
        $users = User::factory(2)->create();
        Sanctum::actingAs($users[0]);

        $this->get(route('users.show', ['user' => $users[1]->id]))
            ->assertForbidden();
    }
}
