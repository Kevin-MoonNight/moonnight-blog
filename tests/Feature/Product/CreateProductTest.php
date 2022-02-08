<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_not_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $product = Product::factory(['slug' => 'test'])->make();

        $this->post(route('dashboard.products.store'), $product->getAttributes())
            ->assertForbidden();

        $this->assertDatabaseCount('products', 0);
        $this->assertDatabaseMissing('products', [
            'slug' => 'test'
        ]);
    }

    public function test_admin_can_be_created()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $product = Product::factory(['slug' => 'test'])->make();

        $this->post(route('dashboard.products.store'), $product->getAttributes())
            ->assertRedirect(route('dashboard.products.index'));

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'slug' => 'test'
        ]);
    }
}
