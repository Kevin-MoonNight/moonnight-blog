<?php

namespace Tests\Feature\Filament\Article;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
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
        $this->get(ArticleResource::getUrl('edit', [
            'record' => Article::factory()->create(),
        ]))->assertSuccessful();
    }

    public function test_can_retrieve_data()
    {
        $article = Article::factory()->create();

        Livewire::test(ArticleResource\Pages\EditArticle::class, [
            'record' => $article->slug
        ])
            ->assertSet('data.title', $article->title)
            ->assertSet('data.slug', $article->slug)
            ->assertSet('data.excerpt', $article->excerpt)
            ->assertSet('data.content', $article->content)
            ->assertSet('data.state', $article->state)
            ->assertSet('data.user_id', $article->user_id);
    }

    public function test_can_be_updated()
    {
        $article = Article::factory()->create();
        $newData = Article::factory()->make();

        //update data
        Livewire::test(ArticleResource\Pages\EditArticle::class, [
            'record' => $article->slug
        ])
            ->set('data.title', $newData->title)
            ->set('data.slug', $newData->slug)
            ->set('data.excerpt', $newData->excerpt)
            ->set('data.content', $newData->content)
            ->set('data.thumbnail', $newData->thumbnail)
            ->set('data.state', $newData->state)
            ->set('data.user_id', $newData->user_id)
            ->call('save')
            ->assertRedirect(ArticleResource::getUrl());

        //data is updated
        $this->assertDatabaseHas(Article::class, [
            'title' => $newData->title,
            'slug' => $newData->slug,
            'excerpt' => $newData->excerpt,
            'content' => $newData->content,
            'state' => $newData->state,
            'user_id' => $newData->user_id,
        ]);

        //thumbnail is updated
        $path = str_replace('/articles', '', $article->thumbnail);
        Storage::disk('s3')->assertMissing($path);
        $newPath = str_replace('/storage', '', $article->refresh()->thumbnail);
        Storage::disk('s3')->assertExists($newPath);
    }
}
