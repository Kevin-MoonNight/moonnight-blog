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

        $this->get(route('products.index'))
            ->assertJsonCount(1, 'data')
            ->assertOk();

        $product->delete();
    }
}
