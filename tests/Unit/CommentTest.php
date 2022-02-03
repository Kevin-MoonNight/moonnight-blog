<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_article_can_get_comment()
    {
        $article = Article::factory()->create();

        $comment = Comment::factory()
            ->for($article)
            ->create();

        $this->assertCount(1, $article->comments()->get());
        $this->assertEquals($comment->comment, $article->comments()->first()->comment);
    }

    public function test_user_can_get_comment()
    {
        $user = User::factory()->create();

        $comment = Comment::factory()
            ->for($user)
            ->create();

        $this->assertCount(1, $user->comments()->get());
        $this->assertEquals($comment->comment, $user->comments()->first()->comment);
    }

    public function test_comment_can_get_article()
    {
        $article = Article::factory()->create();

        $comment = Comment::factory()
            ->for($article)
            ->create();

        $this->assertEquals($article->slug, $comment->article()->first()->slug);
    }

    public function test_comment_can_get_user()
    {
        $user = User::factory()->create();

        $comment = Comment::factory()
            ->for($user)
            ->create();

        $this->assertEquals($user->id, $comment->user()->first()->id);
    }

    public function test_comment_can_get_replies()
    {
        $article = Article::factory()->create();

        $comment = Comment::factory()
            ->for($article)
            ->has(
                Comment::factory()
                    ->count(3)
                    ->for($article),
                'replies'
            )->create();

        $this->assertCount(3, $comment->replies()->get());
    }
}
