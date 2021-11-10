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
    public function definition()
    {
        $title = $this->faker->sentence;

        $image = new UploadedFile(storage_path('app/test-files/thumbnail.jpg'), 'thumbnail.jpg', null, null, true);
        $imagePath = "storage/" . $image->store('thumbnail');

        return [
            'title' => $this->faker->realText(10),
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'content' => $this->faker->realTextBetween(160, 200),
            'views' => $this->faker->numberBetween(100, 500),
            'thumbnail' => $imagePath,
            'state' => $this->faker->boolean,
            'user_id' => User::factory()
        ];
    }
}
