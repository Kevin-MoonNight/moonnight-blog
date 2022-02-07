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

        $response = $this->get(route('tags.show', ['tag' => $tag->getAttribute('slug')]))
            ->assertOk();

        $this->assertEquals($tag->getAttribute('slug'), $response->json('slug'));
    }
}
