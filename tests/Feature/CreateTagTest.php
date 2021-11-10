<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CreateTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_created()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $tag = Tag::factory()->make();

        $this->post(route('tags.store'), $tag->getAttributes())
            ->assertCreated();

        $this->assertDatabaseCount('tags', 1);
        $this->assertDatabaseHas('tags', [
            'slug' => $tag->getAttribute('slug')
        ]);
    }
}
