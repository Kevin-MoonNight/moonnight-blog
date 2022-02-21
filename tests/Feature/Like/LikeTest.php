<?php

namespace Tests\Feature\Like;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_render_dashboard_likes()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.articles.likes'))
            ->assertOk();
    }
}
