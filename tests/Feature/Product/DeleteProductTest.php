<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this->delete(route('dashboard.products.destroy', ['product' => $product->getAttribute('slug')]))
            ->assertForbidden();

        $this->assertDatabaseCount('products', 1);
    }

    public function test_admin_can_be_deleted()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this->delete(route('dashboard.products.destroy', ['product' => $product->getAttribute('slug')]))
            ->assertRedirect(route('dashboard.products.index'));

        $this->assertDeleted($product);
    }
}
