<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request->all())->latest()->paginate(10)->withQueryString();

        if ($request->route()->named('dashboard.products.index')) {
            return view('backend.products', ['products' => $products]);
        } else {
            return view('frontend.products', ['products' => $products]);
        }
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $validated['thumbnail'] = $this->saveThumbnail($validated['thumbnail']);

        Product::create($validated);

        return redirect()->route('dashboard.products.index');
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $validated['thumbnail'] = isset($validated['thumbnail']) ? $this->saveThumbnail($validated['thumbnail'], $product) : $product->thumbnail;

        $product->update($validated);

        return redirect()->route('dashboard.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index');
    }

    private function saveThumbnail($thumbnail, $product = null)
    {
        if (isset($product)) {
            (new ImagesController)->destroy($product->thumbnail);
        }

        return (new ImagesController)->create($thumbnail);
    }
}
