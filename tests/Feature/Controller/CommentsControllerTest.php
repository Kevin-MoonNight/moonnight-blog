<?php

namespace Tests\Feature\Controller;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_comment_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $article = Article::factory()->create();
        $comment = Comment::factory(['article_id' => $article, 'user_id' => $user])->make();

        $this->post(route('comments.store'), $comment->toArray())
            ->assertRedirect(route('articles.show', ['article' => $article]));

        $this->assertDatabaseCount('comments', 1);
    }

    public function test_comment_can_not_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post(route('comments.store'), [])
            ->assertInvalid(['comment', 'article_id']);
    }
}
