<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

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
        $image = new UploadedFile(storage_path('app/test-files/thumbnail.jpg'), 'thumbnail.jpg', null, null, true);
        $imagePath = "storage/" . $image->store('thumbnail');

        return [
            'name'=> $this->faker->sentence,
            'excerpt'=> $this->faker->sentence,
            'thumbnail'=> $imagePath,
        ];
    }
}
