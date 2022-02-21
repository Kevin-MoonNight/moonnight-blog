<?php

namespace Tests\Feature\Like;

use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateLikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_like_article()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory()->create();

        $this->post(route('likes.store'), ['article_id' => $article->id])
            ->assertCreated();

        $like = Like::first();

        $this->assertEquals($article->id, $like->article_id);
        $this->assertEquals($user->id, $like->user_id);
    }
}
