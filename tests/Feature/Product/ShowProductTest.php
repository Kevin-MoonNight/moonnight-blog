<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ShowProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_show()
    {
        $user = User::factory(['is_admin' => 1])->create();
        Sanctum::actingAs($user);

        $product = Product::factory()->create();

        $response = $this->get(route('products.show', ['product' => $product->id]))
            ->assertOk();

        $this->assertEquals($product->getAttribute('name'), $response->json('name'));

        $product->delete();
    }
}
