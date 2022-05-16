<?php

namespace Tests\Feature\Controller;

use App\Models\Article;
use Database\Seeders\ArticleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ArticleSeeder::class);
    }

    public function test_articles_can_be_render()
    {
        $this->get(route('articles.index'))
            ->assertSuccessful();
    }

    public function test_show_article_can_be_find()
    {
        $article = Article::where('state', true)->first();;

        $this->get(route('articles.show', ['article' => $article]))
            ->assertSuccessful();

        $this->assertTrue($article->views + 1 === $article->refresh()->views);
    }

    public function test_show_article_can_not_find()
    {
        $article = Article::where('state', false)->first();;

        $this->get(route('articles.show', ['article' => $article]))
            ->assertNotFound();
    }
}
