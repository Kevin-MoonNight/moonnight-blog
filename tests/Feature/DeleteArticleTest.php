<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_deleted(){

        $user = User::factory()->create();
        $article = Article::factory()->make();

        Article::create($article);

        $article->delete();

        $this->assertCount(0,Article::all());
    }
}
