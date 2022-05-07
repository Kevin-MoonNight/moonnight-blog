<?php

namespace App\View\Components\Products;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsCard extends Component
{
    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function render(): View
    {
        return view('components.products.products-card');
    }
}
