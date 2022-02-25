<?php

namespace Tests\Feature\Comment;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_comment()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $comment = Comment::factory()->for($user)->create();

        $this->delete(route('comments.destroy', ['comment' => $comment->id]))
            ->assertOk();

        $this->assertDatabaseCount('comments', 0);
        $this->assertDeleted($comment);
    }
}
