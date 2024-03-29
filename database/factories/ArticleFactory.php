<?php

namespace Database\Factories;

use App\Http\Controllers\ImagesController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        if (User::count() === 0) {
            User::factory(10)->create();
        }

        return [
            'title' => $this->faker->unique()->realText(100),
            'slug' => $this->faker->unique()->slug(20),
            'excerpt' => $this->faker->sentence,
            'content' => $this->faker->realTextBetween(500, 1000),
            'views' => $this->faker->numberBetween(100, 500),
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
            'state' => $this->faker->boolean,
            'user_id' => User::all()->random()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $imagePath = ImagesController::getRandomCatImageUrl();
            $article->setAttribute('thumbnail', $imagePath);
            $article->save();
        });
    }
}
