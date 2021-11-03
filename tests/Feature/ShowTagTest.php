<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_show()
    {
        $tag = Tag::factory()->create();

        $response = $this->get(route('tags.show', ['tag' => $tag->slug]))
            ->assertStatus(200);

        $this->assertEquals($tag->slug , $response->json('slug'));
    }
}
