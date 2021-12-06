<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_created()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $article = [
            'title' => 'test',
            'slug' => 'test',
            'excerpt' => 'test',
            'content' => 'test',
            'thumbnail' => new UploadedFile(storage_path('app/test-files/thumbnail.jpg'), 'thumbnail.jpg', null, null, true),
            'state' => 1,
        ];

        $this->post(route('articles.store'), $article)
            ->assertCreated();


        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'slug' => 'test'
        ]);

        $user->articles()->first()->forceDelete();
    }
}
