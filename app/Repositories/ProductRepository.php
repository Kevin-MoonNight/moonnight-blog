<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository
{
    private Model $product;

    public function __construct()
    {
        $this->product = app(Product::class);
    }

    public function getProducts(array $filters)
    {
        return $this->product->filter($filters)->latest()->paginate(9)->withQueryString();
    }
}
