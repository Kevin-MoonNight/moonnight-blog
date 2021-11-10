<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_deleted()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $product = Product::factory()->create();

        $this->delete(route('products.destroy', ['product' => $product->getAttribute('id')]))
            ->assertOk();

        $this->assertDeleted($product);
        $this->assertDatabaseCount('products', 0);
    }
}
