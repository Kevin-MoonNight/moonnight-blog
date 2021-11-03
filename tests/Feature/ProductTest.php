<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_get()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.index'))
            ->assertStatus(200);

        $this->assertCount(1, $response->json('data'));
        $this->assertDatabaseCount('products', 1);

        $product->delete();
    }
}
