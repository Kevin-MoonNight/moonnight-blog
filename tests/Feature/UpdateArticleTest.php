<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_updated()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $this->post(route('articles.update', ['article' => $article->getAttribute('slug')]), [
            'title' => 'test2',
            'slug' => 'test',
            'excerpt' => 'test',
            'content' => 'test',
            'state' => 1,
        ])->assertOk();

        $this->assertEquals('test2', $article->fresh()->getAttribute('title'));
        $article->forceDelete();
    }
}
