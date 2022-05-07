<?php

namespace App\Observers;

use App\Http\Controllers\ImagesController;
use App\Models\Article;

class ArticleObserver
{
    public function forceDeleted(Article $article)
    {
        //文章刪除 縮圖也要跟著刪除
        ImagesController::destroy($article->thumbnail);
    }
}
