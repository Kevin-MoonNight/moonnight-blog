<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use App\Observers\ArticleObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Gate;
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

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('update-user', function (User $user, User $updatedUser) {
            return $user->is_admin || ($user->id === $updatedUser->id);
        });

        Gate::define('update-article', function (User $user, Article $article) {
            return $user->is_admin || ($user->id === $article->user_id);
        });
    }
}
