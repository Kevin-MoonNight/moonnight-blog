<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_soft_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        //軟刪除
        $this->delete(route('dashboard.articles.destroy', ['article' => $article->getAttribute('slug')]))
            ->assertForbidden();

        $this->assertNotSoftDeleted($article);
    }

    public function test_user_can_not_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->delete();

        //完全刪除
        $this->delete(route('dashboard.articles.force-delete', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertForbidden();

        $this->assertDatabaseHas('articles', [
            'slug' => $article->getAttribute('slug')
        ]);
    }

    public function test_user_can_not_be_restored()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->delete();

        $this->get(route('dashboard.articles.restore', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertForbidden();
    }

    public function test_author_can_be_soft_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        //軟刪除
        $this->delete(route('dashboard.articles.destroy', ['article' => $article->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.articles.index'));

        $this->assertSoftDeleted($article);
    }

    public function test_author_can_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->delete();

        //完全刪除
        $this->delete(route('dashboard.articles.force-delete', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.articles.trashed'));

        $this->assertDatabaseMissing('articles', [
            'slug' => $article->getAttribute('slug')
        ]);
    }

    public function test_author_can_be_restored()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->delete();

        $this->get(route('dashboard.articles.restore', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.articles.trashed'));

        $this->assertNotSoftDeleted($article);
    }

    public function test_admin_can_be_soft_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        //軟刪除
        $this->delete(route('dashboard.articles.destroy', ['article' => $article->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.articles.index'));

        $this->assertSoftDeleted($article);
    }

    public function test_admin_can_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->delete();

        //完全刪除
        $this->delete(route('dashboard.articles.force-delete', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.articles.trashed'));

        $this->assertDatabaseMissing('articles', [
            'slug' => $article->getAttribute('slug')
        ]);
    }

    public function test_admin_can_be_restored()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->delete();

        $this->get(route('dashboard.articles.restore', ['trashed_article' => $article->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.articles.trashed'));

        $this->assertNotSoftDeleted($article);
    }
}
