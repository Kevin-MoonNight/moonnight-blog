<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Product;
use App\Observers\ArticleObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Article::observe(ArticleObserver::class);
        Product::observe(ProductObserver::class);
    }
}
