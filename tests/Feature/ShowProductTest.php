<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_show()
    {
        $user = User::factory(['is_admin' => 1])->create();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $product = Product::factory()->create();

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->get(route('products.show', ['product' => $product->id]))
            ->assertStatus(200);

        $this->assertEquals($product->name, $response->json('name'));

        $product->delete();
    }
}
