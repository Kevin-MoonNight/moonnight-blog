<?php

namespace Tests\Feature\Controller;

use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_page_can_be_render()
    {
        $this->seed(ProductSeeder::class);

        $this->get(route('products.index'))
            ->assertOk();
    }
}
