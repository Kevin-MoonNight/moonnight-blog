<?php

namespace Tests\Feature\Article;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.create'))
            ->assertForbidden();
    }

    public function test_user_can_not_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->id])->make();

        $this->withHeaders([
            'enctype' => 'multipart/form-data'
        ])->post(route('dashboard.articles.store'), $article->getAttributes())
            ->assertForbidden();

        $this->assertDatabaseCount('articles', 0);
        $this->assertDatabaseMissing('articles', [
            'slug' => $article->getAttribute('slug')
        ]);
    }

    public function test_author_can_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);

        $this->actingAs($user);

        $this->get(route('dashboard.articles.create'))
            ->assertOk();
    }

    public function test_author_can_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->id])->make();

        $this->withHeaders([
            'enctype' => 'multipart/form-data'
        ])->post(route('dashboard.articles.store'), $article->getAttributes())
            ->assertRedirect(route('dashboard.articles.index'));

        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'slug' => $article->getAttribute('slug')
        ]);
    }

    public function test_admin_can_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);

        $this->actingAs($user);

        $this->get(route('dashboard.articles.create'))
            ->assertOk();
    }

    public function test_admin_can_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $article = Article::factory(['user_id' => $user->id])->make();

        $this->withHeaders([
            'enctype' => 'multipart/form-data'
        ])->post(route('dashboard.articles.store'), $article->getAttributes())
            ->assertRedirect(route('dashboard.articles.index'));

        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'slug' => $article->getAttribute('slug')
        ]);
    }
}
