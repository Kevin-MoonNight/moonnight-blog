<?php

namespace Tests\Feature\Comment;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_comment()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $comment = Comment::factory([
            'comment' => 'test1'
        ])->for($user)->create();

        $this->put(route('comments.update', ['comment' => $comment->id]), [
            'comment' => 'test2'
        ])->assertOk();

        $this->assertEquals('test2', $comment->refresh()->comment);
    }
}
