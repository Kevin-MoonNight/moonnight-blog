<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_soft_deleted()
    {
        $user = User::factory(['is_admin' => 1])->create();

        $token = $user->createToken('myapptoken')->plainTextToken;

        $article = Article::factory(['user_id' => $user->id])->create();

        //軟刪除
        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->delete(route('articles.destroy', ['article' => $article->slug]))
            ->assertStatus(200);

        $this->assertSoftDeleted($article);
        $this->assertDatabaseCount('articles', 1);

        $article->forceDelete();
    }

    public function test_article_can_be_deleted()
    {
        $user = User::factory(['is_admin' => 1])->create();

        $token = $user->createToken('myapptoken')->plainTextToken;

        $article = Article::factory(['user_id' => $user->id])->create();

        $article->delete();

        //完全刪除
        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->delete(route('articles.deleteTrashed', ['trashed_article' => $article->slug]))
            ->assertStatus(200);

        $this->assertDatabaseCount('articles', 0);
        $this->assertDeleted($article);
    }

    public function test_article_can_be_restored()
    {
        $user = User::factory(['is_admin' => 1])->create();

        $token = $user->createToken('myapptoken')->plainTextToken;

        $article = Article::factory(['user_id' => $user->id])->create();

        $article->delete();

        //完全刪除
        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(route('articles.restore', ['trashed_article' => $article->slug]))
            ->assertStatus(200);

        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'slug' => $article->slug
        ]);

        $article->forceDelete();
    }
}
