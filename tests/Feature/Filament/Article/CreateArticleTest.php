<?php

namespace Tests\Feature\Filament\Article;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Storage;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user);
        Storage::fake('s3');
    }

    public function test_page_can_be_render()
    {
        $this->get(ArticleResource::getUrl('create'))->assertSuccessful();
    }

    public function test_can_be_created()
    {
        $article = Article::factory()->make();

        //create article
        Livewire::test(ArticleResource\Pages\CreateArticle::class)
            ->set('data.title', $article->title)
            ->set('data.slug', $article->slug)
            ->set('data.excerpt', $article->excerpt)
            ->set('data.content', $article->content)
            ->set('data.thumbnail', $article->thumbnail)
            ->set('data.state', $article->state)
            ->set('data.user_id', $article->user_id)
            ->call('create')
            ->assertRedirect(ArticleResource::getUrl());

        //article is created
        $article = Article::firstWhere($article->getKey());
        $this->assertDatabaseHas(Article::class, [
            'title' => $article->title,
            'slug' => $article->slug,
            'excerpt' => $article->excerpt,
            'content' => $article->content,
            'thumbnail' => $article->thumbnail,
            'state' => $article->state,
            'user_id' => $article->user_id,
        ]);

        //has thumbnail
        $path = str_replace('/storage', '', $article->thumbnail);
        Storage::disk('s3')->assertExists($path);
    }
}
