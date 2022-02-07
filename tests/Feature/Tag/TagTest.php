<?php

namespace Tests\Feature\Tag;

use App\Models\User;
use Database\Seeders\TagSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_render()
    {
        $this->seed(TagSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.tags.index'))
            ->assertForbidden();
    }

    public function test_author_can_be_render()
    {
        $this->seed(TagSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $this->get(route('dashboard.tags.index'))
            ->assertOk();
    }

    public function test_admin_can_be_render()
    {
        $this->seed(TagSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.tags.index'))
            ->assertOk();
    }
}
