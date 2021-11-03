<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_updated()
    {
        $tag = Tag::factory()->create();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->put(route('tags.update', ['tag' => $tag->slug]), [
                'name' => 'TestTag',
                'slug' => 'test-tag'
            ])
            ->assertStatus(200);

        $this->assertEquals('test-tag', $tag->fresh()->slug);
    }
}
