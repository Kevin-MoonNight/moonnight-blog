<?php

namespace Database\Factories;

use App\Http\Controllers\ImagesController;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->realText(10);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'excerpt' => $this->faker->sentence,
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $imagePath = ImagesController::create(UploadedFile::fake()->image('thumbnail.jpg'));
            $product->setAttribute('thumbnail', $imagePath);
            $product->save();
        });
    }
}
