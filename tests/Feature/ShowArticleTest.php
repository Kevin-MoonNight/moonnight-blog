<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_show()
    {
        $article = Article::factory()->create();

        $response = $this->get(route('articles.show', ['article' => $article->slug]))
            ->assertStatus(200);

        $this->assertEquals($article->slug, $response->json('slug'));

        $article->forceDelete();
    }
}
