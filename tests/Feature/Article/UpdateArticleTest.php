<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $this->get(route('dashboard.articles.edit', ['article' => $article->getAttribute('slug')]))
            ->assertForbidden();
    }

    public function test_user_can_not_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->setAttribute('title', 'test');
        //去除thumbnail
        $data = collect($article->getAttributes())->except('thumbnail')->toArray();

        $this->withHeaders([
            'enctype' => 'multipart/form-data'
        ])->put(route('dashboard.articles.update', ['article' => $article->getAttribute('slug')]), $data)
            ->assertForbidden();

        $this->assertDatabaseMissing('articles', [
            'title' => $article->getAttribute('title')
        ]);
    }

    public function test_author_can_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $this->get(route('dashboard.articles.edit', ['article' => $article->getAttribute('slug')]))
            ->assertOk();
    }

    public function test_author_can_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->setAttribute('title', 'test');
        //去除thumbnail
        $data = collect($article->getAttributes())->except('thumbnail')->toArray();

        $this->withHeaders([
            'enctype' => 'multipart/form-data'
        ])->put(route('dashboard.articles.update', ['article' => $article->getAttribute('slug')]), $data)
            ->assertRedirect(route('dashboard.articles.index'));

        $this->assertDatabaseHas('articles', [
            'title' => $article->getAttribute('title')
        ]);
    }

    public function test_admin_can_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $this->get(route('dashboard.articles.edit', ['article' => $article->getAttribute('slug')]))
            ->assertOk();
    }

    public function test_admin_can_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->getAttribute('id')])->create();

        $article->setAttribute('title', 'test');
        //去除thumbnail
        $data = collect($article->getAttributes())->except('thumbnail')->toArray();

        $this->withHeaders([
            'enctype' => 'multipart/form-data'
        ])->put(route('dashboard.articles.update', ['article' => $article->getAttribute('slug')]), $data)
            ->assertRedirect(route('dashboard.articles.index'));

        $this->assertDatabaseHas('articles', [
            'title' => $article->getAttribute('title')
        ]);
    }
}
