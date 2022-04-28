<?php

namespace App\View\Components\Homes;

use App\Models\Product;
use Illuminate\View\Component;

class Products extends Component
{
    public $products;

    public function __construct()
    {
        $this->products = Product::latest()->take(15)->get()->toJson();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.homes.products');
    }
}
