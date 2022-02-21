<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Message;
use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'Kevin'
        ]);

        Article::factory(50)->create([
            'user_id' => $user->id,
            'state' => true
        ]);

        Tag::factory(20)->create();
        Message::factory(20)->create();
        Product::factory(20)->create();
        User::factory(10)->create();
    }
}
