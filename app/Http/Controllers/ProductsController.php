<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'can:admin'])->except('index');
    }

    public function index()
    {
        return Product::latest()->paginate(12);
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $validated['thumbnail'] = $this->saveThumbnail($validated['thumbnail']);

        return Product::create($validated);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validated();

        $validated['thumbnail'] = isset($validated['thumbnail']) ? $this->saveThumbnail($validated['thumbnail'], $product) : $product->thumbnail;

        return $product->update($validated);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }

    private function saveThumbnail($thumbnail, $product = null)
    {
        if (isset($product)) {
            (new ImagesController)->destroy($product->thumbnail);
        }

        return (new ImagesController)->create($thumbnail);
    }
}
