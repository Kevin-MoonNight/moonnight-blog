<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_deleted()
    {
        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $product = Product::factory()->create();

        $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->delete(route('products.destroy', ['product' => $product->id]))
            ->assertStatus(200);

        $this->assertDeleted($product);
        $this->assertDatabaseCount('products', 0);
    }
}
