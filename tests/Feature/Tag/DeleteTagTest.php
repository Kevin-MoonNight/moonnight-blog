<?php

namespace Tests\Feature\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $tag = Tag::factory()->create();

        $this->delete(route('dashboard.tags.destroy', ['tag' => $tag->getAttribute('slug')]))
            ->assertForbidden();

        $this->assertDatabaseHas('tags', [
            'slug' => $tag->getAttribute('slug')
        ]);
    }

    public function test_author_can_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $tag = Tag::factory()->create();

        $this->delete(route('dashboard.tags.destroy', ['tag' => $tag->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.tags.index'));

        $this->assertDeleted($tag);
    }

    public function test_admin_can_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $tag = Tag::factory()->create();

        $this->delete(route('dashboard.tags.destroy', ['tag' => $tag->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.tags.index'));

        $this->assertDeleted($tag);
    }
}
