<?php

namespace Tests\Feature\Like;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteLikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_unlike_article()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $article = Article::factory()->create();

        $user->likes()->save($article);
        $user->refresh();

        $this->delete(route('likes.destroy', ['article' => $article]))
            ->assertOk();

        $this->assertCount(0,$user->likes()->get());
    }
}
