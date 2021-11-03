<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_be_updated()
    {
        $user = User::factory(['is_admin' => 1])->create();

        $token = $user->createToken('myapptoken')->plainTextToken;

        $article = Article::factory(['user_id' => $user->id])->create();

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post(route('articles.update', ['article' => $article->slug]), [
                'title' => 'test2',
                'slug' => 'test',
                'excerpt' => 'test',
                'content' => 'test',
                'state' => 1,
            ])
            ->assertStatus(200);

        $this->assertEquals('test2', $article->fresh()->title);

        $article->forceDelete();
    }
}
