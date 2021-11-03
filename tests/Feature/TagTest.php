<?php

namespace Tests\Feature;

use Database\Seeders\TagSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_tags_can_be_get()
    {
        $this->seed(TagSeeder::class);

        $this->get(route('tags.index'))
            ->assertStatus(200);
    }
}
