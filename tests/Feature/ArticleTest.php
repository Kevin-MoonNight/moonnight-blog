<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_articles_can_be_get()
    {
        $article = Article::factory(['state' => 1])->create();

        $response = $this->get(route('articles.index'))
            ->assertStatus(200);

        $this->assertCount(1, $response->json('data'));

        $article->forceDelete();
    }

    public function test_popular_articles_can_be_get()
    {
        $article = Article::factory(['state' => 1])->create();

        $response = $this->get(route('articles.popular'))
            ->assertStatus(200);

        $this->assertCount(1, $response->json());

        $article->forceDelete();
    }

    public function test_draft_articles_can_be_get()
    {
        $article = Article::factory(['state' => 0])->create();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(route('articles.draft'))
            ->assertStatus(200);

        $this->assertCount(1, $response->json('data'));

        $article->forceDelete();
    }

    public function test_trashed_articles_can_be_get()
    {
        $article = Article::factory()->create();

        $article->delete();

        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(route('articles.trashed'))
            ->assertStatus(200);

        $this->assertCount(1, $response->json('data'));

        $article->forceDelete();
    }
}

