<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_article_like()
    {
        $article = Article::factory()->create();
        $user = User::factory()->create();

        $article->likes()->save($user);
        $article->refresh();

        $response = $article->likes()->get();

        $this->assertCount(1, $response);
    }

    public function test_user_like()
    {
        $article = Article::factory()->create();
        $user = User::factory()->create();

        $user->likes()->save($article);
        $user->refresh();

        $response = $user->likes()->get();

        $this->assertCount(1, $response);
    }
}
