<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_updated()
    {
        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $product = Product::factory()->create();
        $newProduct = [
            'name' => 'test',
            'excerpt' => 'test',
            'thumbnail' => new UploadedFile(storage_path('app/test-files/thumbnail.jpg'), 'thumbnail.jpg', null, null, true)
        ];

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->post(route('products.update', ['product' => $product->id]), $newProduct)
            ->assertStatus(200);

        $this->assertEquals('test', $product->fresh()->name);

        $product->fresh()->delete();
    }
}
