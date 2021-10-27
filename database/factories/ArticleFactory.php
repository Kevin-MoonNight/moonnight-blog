<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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

        return [
            'title'=> $this->faker->realText(10),
            'slug'=> Str::lower($title),
            'excerpt'=>$this->faker->sentence,
            'content'=> $this->faker->realTextBetween(160,200),
            'views'=> $this->faker->numberBetween(100,500),
            'thumbnail'=> $this->faker->imageUrl(300,300,'nature'),
            'state'=> $this->faker->boolean,
            'user_id'=> User::factory()
        ];
    }
}
