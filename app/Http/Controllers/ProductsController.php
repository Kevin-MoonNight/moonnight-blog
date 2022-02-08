<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->authorizeResource(Product::class);
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->getProducts($request->all());

        return view('frontend.products', ['products' => $products]);
    }

    public function dashboard(Request $request)
    {
        $this->authorize('dashboard', Product::class);

        $products = $this->productRepository->getProducts($request->all());

        return view('backend.products', ['products' => $products]);
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
