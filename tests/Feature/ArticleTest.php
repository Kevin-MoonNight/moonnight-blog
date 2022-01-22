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

    public function test_articles_can_be_render()
    {
        $this->get(route('articles.index'))
            ->assertOk();
    }

    public function test_user_can_not_be_render_dashboard_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.index'))
            ->assertForbidden();
    }

    public function test_user_can_not_be_render_draft_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.draft'))
            ->assertForbidden();
    }

    public function test_user_can_not_be_render_trashed_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.trashed'))
            ->assertForbidden();
    }

    public function test_author_can_not_be_render_dashboard_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.index'))
            ->assertOk();
    }

    public function test_author_can_not_be_render_draft_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.draft'))
            ->assertOk();
    }

    public function test_author_can_not_be_render_trashed_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.trashed'))
            ->assertOk();
    }

    public function test_admin_can_not_be_render_dashboard_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.index'))
            ->assertOk();
    }

    public function test_admin_can_not_be_render_draft_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.draft'))
            ->assertOk();
    }

    public function test_admin_can_not_be_render_trashed_articles()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.trashed'))
            ->assertOk();
    }
}

