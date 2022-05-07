<?php

namespace App\View\Components\Homes;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Products extends Component
{
    public $products;

    public function __construct()
    {
        $this->products = Product::latest()->take(15)->get()->toJson();
    }

    public function render(): View
    {
        return view('components.homes.products');
    }
}
