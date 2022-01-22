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
        $article = Article::factory(['state' => 1])->create();

        $this->get(route('articles.show', ['article' => $article->getAttribute('slug')]))
            ->assertOk();
    }

    public function test_draft_article_can_not_be_show()
    {
        $article = Article::factory(['state' => 0])->create();

        $this->get(route('articles.show', ['article' => $article->getAttribute('slug')]))
            ->assertNotFound();
    }
}
