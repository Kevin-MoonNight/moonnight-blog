<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $product = Product::factory()->create();

        $newProduct = Product::factory(['slug' => 'test'])->make();

        $this->put(route('dashboard.products.update', ['product' => $product->getAttribute('slug')]), $newProduct->getAttributes())
            ->assertForbidden();

        $this->assertNotEquals($product->getAttribute('slug'), $newProduct->getAttribute('slug'));
    }

    public function test_admin_can_be_updated()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $product = Product::factory()->create();

        $newProduct = Product::factory(['slug' => 'test'])->make();

        $this->put(route('dashboard.products.update', ['product' => $product->getAttribute('slug')]), $newProduct->getAttributes())
            ->assertRedirect(route('dashboard.products.index'));

        $this->assertEquals($product->fresh()->getAttribute('slug'), $newProduct->getAttribute('slug'));
    }
}
