<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use http\Env\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_screen_can_be_rendered()
    {
        $response = $this->get('/articles');

        $response->assertStatus(200);
    }

    public function test_show_article_screen_can_be_rendered()
    {
        $user = User::factory(1)->create();
        $article = Article::factory(1)->create()->first();


        $response = $this->get("/articles/{$article->id}");

        $response->assertStatus(200);
    }
//    public function test_create_article_screen_can_be_rendered()
//    {
//        $response = $this->get('/articles');
//
//        $response->assertStatus(200);
//    }


}
