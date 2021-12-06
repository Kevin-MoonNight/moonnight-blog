<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $this->delete(route('users.destroy', ['user' => $user->getAttribute('id')]))
            ->assertOk();

        $this->assertDatabaseCount('users', 0);
        $this->assertDeleted($user);
    }

    public function test_user_can_not_be_deleted()
    {
        $users = User::factory(2)->create();
        Sanctum::actingAs($users[0]);

        $this->delete(route('users.destroy', ['user' => $users[1]->id]))
            ->assertForbidden();
    }
}
