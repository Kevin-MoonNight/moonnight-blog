<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_soft_deleted()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $article = Article::factory(['user_id' => $user->id])->create();

        //軟刪除
        $this->delete(route('articles.destroy', ['article' => $article->getAttribute('slug')]))
            ->assertOk();

        $this->assertSoftDeleted($article);
        $this->assertDatabaseCount('articles', 1);

        $article->forceDelete();
    }

    public function test_article_can_be_deleted()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $article = Article::factory(['user_id' => $user->id])->create();

        $article->delete();

        //完全刪除
        $this->delete(route('articles.delete-trashed', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertOk();

        $this->assertDatabaseCount('articles', 0);
        $this->assertDeleted($article);
    }

    public function test_article_can_be_restored()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $article = Article::factory(['user_id' => $user->id])->create();

        $article->delete();

        //完全刪除
        $this->get(route('articles.restore', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertStatus(200);

        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'slug' => $article->getAttribute('slug')
        ]);

        $article->forceDelete();
    }
}
