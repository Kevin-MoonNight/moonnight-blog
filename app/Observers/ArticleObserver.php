<?php

namespace App\Observers;

use App\Http\Controllers\ImagesController;
use App\Models\Article;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param Article $article
     * @return void
     */
    public function created(Article $article)
    {
        //
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param Article $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param Article $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param Article $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param Article $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //文章刪除 縮圖也要跟著刪除
        (new ImagesController())->destroy($article->thumbnail);
    }
}
