<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_updated(){

        $user = User::factory()->create();
        $article = Article::factory()->make();

        Article::create($article);

        $article->title = '123';
        $article->content = '123';

        $article->update();

        $this->assertEquals($article->title, Article::first()->title);
        $this->assertEquals($article->content, Article::first()->content);
    }
}
