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
            return $user->getAttribute('is_admin');
        });

        Gate::define('user', function (User $user, User $editUser) {
            return ($user->getAttribute('id') === $editUser->getAttribute('id'));
        });

        Gate::define('article', function (User $user, Article $article) {
            return ($user->getAttribute('id') === $article->getAttribute('user_id'));
        });
    }
}
