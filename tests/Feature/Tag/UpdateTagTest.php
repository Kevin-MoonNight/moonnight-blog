<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_updated()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $tag = Tag::factory(['name' => 'test1'])->create();
        $tag->setAttribute('name', 'test2');

        $this->put(route('tags.update', ['tag' => $tag->getAttribute('slug')]), $tag->getAttributes())
            ->assertOk();

        $this->assertEquals($tag->getAttribute('name'), $tag->fresh()->getAttribute('name'));
    }
}
