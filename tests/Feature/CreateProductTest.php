<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created()
    {
        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $product = [
            'name' => 'test',
            'excerpt' => 'test',
            'thumbnail' => new UploadedFile(storage_path('app/test-files/thumbnail.jpg'), 'thumbnail.jpg', null, null, true)
        ];

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post(route('products.store'), $product)
            ->assertStatus(201);

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'name' => 'test'
        ]);

        Product::firstWhere('name', 'test')->delete();
    }
}
