<?php

namespace Tests\Feature\Product;

use App\Models\User;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_render()
    {
        $this->seed(ProductSeeder::class);

        $this->get(route('products.index'))
            ->assertOk();
    }

    public function test_user_can_not_be_render_dashboard_products()
    {
        $this->seed(ProductSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(4);
        $this->actingAs($user);

        $this->get(route('dashboard.products.index'))
            ->assertForbidden();
    }

    public function test_admin_can_be_render_dashboard_products()
    {
        $this->seed(ProductSeeder::class);

        $user = User::factory()->create();
        $user->roles()->attach(1);
        $this->actingAs($user);

        $this->get(route('dashboard.products.index'))
            ->assertOk();
    }
}
