<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_created(){

        $user = User::factory()->create();
        $article = Article::factory()->make();

//        $response = $this->post(route('articles.store'),[$article]);


        $this->assertCount(1,Article::all());
//        $response->assertStatus(201);
    }
}
