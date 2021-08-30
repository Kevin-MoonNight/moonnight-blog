<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Article::factory()->count(10)->create();
        Message::factory()->count(10)->create();
        Tag::factory()->create();
    }
}
