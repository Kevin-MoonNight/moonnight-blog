<?php

namespace Tests\Feature\Filament\Article;

use App\Filament\Resources\ArticleResource;
use App\Models\User;
use Database\Seeders\ArticleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ListArticleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('s3');
        $this->seed(ArticleSeeder::class);
    }

    public function test_list_page_can_not_render()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(ArticleResource::getUrl())
            ->assertForbidden();
    }

    public function test_list_page_can_be_render()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);
        $this->actingAs($user->refresh());

        $this->get(ArticleResource::getUrl())
            ->assertSuccessful();
    }
}

