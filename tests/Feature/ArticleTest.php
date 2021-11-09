<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_articles_can_be_get()
    {
        $article = Article::factory(['state' => 1])->create();

        $response = $this->get(route('articles.index'))
            ->assertOk();

        $this->assertCount(1, $response->json('data'));

        $article->forceDelete();
    }

    public function test_popular_articles_can_be_get()
    {
        $article = Article::factory(['state' => 1])->create();

        $response = $this->get(route('articles.popular'))
            ->assertOk();

        $this->assertCount(1, $response->json());

        $article->forceDelete();
    }

    public function test_draft_articles_can_be_get()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id'), 'state' => 0])->create();

        $response = $this->get(route('articles.draft'))
            ->assertOk();

        $this->assertCount(1, $response->json('data'));

        $article->forceDelete();
    }

    public function test_trashed_articles_can_be_get()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id'), 'state' => 1])->create();

        $article->delete();

        $response = $this->get(route('articles.trashed'))
            ->assertOk();

        $this->assertCount(1, $response->json('data'));

        $article->forceDelete();
    }
}

