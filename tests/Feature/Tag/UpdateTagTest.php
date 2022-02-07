<?php

namespace Tests\Feature\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $tag = Tag::factory()->create();

        $this->get(route('dashboard.tags.edit', ['tag' => $tag->getAttribute('slug')]))
            ->assertForbidden();
    }

    public function test_user_can_not_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $tag = Tag::factory(['name' => 'test1'])->create();
        $tag->setAttribute('name', 'test2');

        $this->put(route('dashboard.tags.update', ['tag' => $tag->getAttribute('slug')]), $tag->getAttributes())
            ->assertForbidden();

        $this->assertNotEquals($tag->getAttribute('name'), $tag->fresh()->getAttribute('name'));
    }

    public function test_author_can_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $tag = Tag::factory()->create();

        $this->get(route('dashboard.tags.edit', ['tag' => $tag->getAttribute('slug')]))
            ->assertOk();
    }

    public function test_author_can_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $tag = Tag::factory(['name' => 'test1'])->create();
        $tag->setAttribute('name', 'test2');

        $this->put(route('dashboard.tags.update', ['tag' => $tag->getAttribute('slug')]), $tag->getAttributes())
            ->assertRedirect(route('dashboard.tags.index'));

        $this->assertEquals($tag->getAttribute('name'), $tag->fresh()->getAttribute('name'));
    }

    public function test_admin_can_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $tag = Tag::factory()->create();

        $this->get(route('dashboard.tags.edit', ['tag' => $tag->getAttribute('slug')]))
            ->assertOk();
    }

    public function test_admin_can_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $tag = Tag::factory(['name' => 'test1'])->create();
        $tag->setAttribute('name', 'test2');

        $this->put(route('dashboard.tags.update', ['tag' => $tag->getAttribute('slug')]), $tag->getAttributes())
            ->assertRedirect(route('dashboard.tags.index'));

        $this->assertEquals($tag->getAttribute('name'), $tag->fresh()->getAttribute('name'));
    }
}
