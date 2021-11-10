<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_deleted()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $tag = Tag::factory()->create();

        $this->delete(route('tags.destroy', ['tag' => $tag->getAttribute('slug')]))
            ->assertOk();

        $this->assertDeleted($tag);
    }
}
