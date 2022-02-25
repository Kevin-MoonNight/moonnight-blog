<?php

namespace Tests\Feature\Comment;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_comment()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $comment = Comment::factory()->make();

        $this->post(route('comments.store'), $comment->getAttributes())
            ->assertCreated();

        $this->assertDatabaseCount('comments', 1);
    }
}
