<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_profile_can_be_updated()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $user->setAttribute('username', 'test');

        $this->put(route('users.update', ['user' => $user->getAttribute('id')]), $user->getAttributes())
            ->assertOk();

        $this->assertEquals($user->getAttributes(), $user->fresh()->getAttributes());
    }

    public function test_user_password_can_be_updated()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $this->put(route('users.update-password', ['user' => $user->getAttribute('id')]), [
            'password' => 'newPassword',
            'password_confirmation' => 'newPassword'
        ])->assertOk();

        $this->assertTrue(Hash::check('newPassword', $user->fresh()->getAttribute('password')));
    }
}
