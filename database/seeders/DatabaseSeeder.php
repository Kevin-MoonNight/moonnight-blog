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

        Article::factory(80)->create([
            'user_id' => $user->id,
            'state' => 1
        ]);

        Tag::factory(20)->create();

        Message::factory(20)->create();
        Product::factory(20)->create();
    }
}
