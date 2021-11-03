<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tag_can_be_created()
    {
        $tag = [
            'name' => 'TestTag',
            'slug' => 'test-tag'
        ];

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post(route('tags.store'), $tag)
            ->assertStatus(201);


        $this->assertDatabaseCount('tags', 1);
        $this->assertDatabaseHas('tags', [
            'slug' => 'test-tag'
        ]);
    }
}
