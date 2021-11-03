<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_deleted()
    {
        $tag = Tag::factory()->create();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->delete(route('tags.destroy', ['tag' => $tag->slug]))
            ->assertStatus(200);

        $this->assertDeleted($tag);
    }
}
