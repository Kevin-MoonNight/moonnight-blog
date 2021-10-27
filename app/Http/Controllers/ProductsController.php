<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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

        $validated['thumbnail'] = $this->saveThumbnail($validated['thumbnail'], $product);

        return $product->update($validated);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }

    private function saveThumbnail($thumbnail, $product = null)
    {
        if (isset($thumbnail)) {
            if (isset($product)) {
                $this->deleteThumbnail($product);
            }
            $imagePath = "storage/" . $thumbnail->store('thumbnail');
            $resizeImage = Image::make(public_path($imagePath))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizeImage->save(public_path($imagePath), 60);
            $resizeImage->save();
        } else {
            $imagePath = $product->thumbnail;
        }

        return $imagePath;
    }

    private function deleteThumbnail($product)
    {
        Storage::delete(Str::of($product->thumbnail)->remove('storage/'));
    }
}
