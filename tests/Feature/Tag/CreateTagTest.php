<?php

namespace Tests\Feature\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.tags.create'))
            ->assertForbidden();
    }

    public function test_user_can_not_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $tag = Tag::factory()->make();

        $this->post(route('dashboard.tags.store'), $tag->getAttributes())
            ->assertForbidden();

        $this->assertDatabaseCount('tags', 0);
        $this->assertDatabaseMissing('tags', [
            'slug' => $tag->getAttribute('slug')
        ]);
    }

    public function test_author_can_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $this->get(route('dashboard.tags.create'))
            ->assertOk();
    }

    public function test_author_can_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $tag = Tag::factory()->make();

        $this->post(route('dashboard.tags.store'), $tag->getAttributes())
            ->assertRedirect(route('dashboard.tags.index'));


        $this->assertDatabaseCount('tags', 1);
        $this->assertDatabaseHas('tags', [
            'slug' => $tag->getAttribute('slug')
        ]);
    }

    public function test_admin_can_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.tags.create'))
            ->assertOk();
    }

    public function test_admin_can_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $tag = Tag::factory()->make();

        $this->post(route('dashboard.tags.store'), $tag->getAttributes())
            ->assertRedirect(route('dashboard.tags.index'));

        $this->assertDatabaseCount('tags', 1);
        $this->assertDatabaseHas('tags', [
            'slug' => $tag->getAttribute('slug')
        ]);
    }
}
