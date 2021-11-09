<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $user = User::factory()->make();
        $user->password_confirmation = $user->password;

        $this->post(route('users.store'), $user->getAttributes())
            ->assertCreated();

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'username' => $user->getAttribute('username')
        ]);
    }
}
