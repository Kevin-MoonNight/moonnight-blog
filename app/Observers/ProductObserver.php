<?php

namespace App\Observers;

use App\Http\Controllers\ImagesController;
use App\Models\Product;

class ProductObserver
{
    public function deleted(Product $product)
    {
        //文章刪除 縮圖也要跟著刪除
        ImagesController::destroy($product->thumbnail);
    }
}
