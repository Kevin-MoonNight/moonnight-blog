<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
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
        $title = $this->faker->unique()->realText(10);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'content' => $this->faker->realTextBetween(160, 200),
            'views' => $this->faker->numberBetween(100, 500),
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg', 100, 100)->size(100),
            'state' => $this->faker->boolean,
            'user_id' => User::factory()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $image = UploadedFile::fake()->image('thumbnail.jpg', 100, 100)->size(100);
            $imagePath = "storage/" . $image->store('thumbnail');
            $article->setAttribute('thumbnail', $imagePath);
            $article->save();
        });
    }
}
