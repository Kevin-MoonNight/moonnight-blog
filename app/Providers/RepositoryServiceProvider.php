<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\MessageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ArticleRepository::class
        );
        $this->app->bind(
            MessageRepository::class
        );
        $this->app->bind(
            TagRepository::class
        );
        $this->app->bind(
            ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            ArticleRepository::class,
            MessageRepository::class,
            TagRepository::class,
            ProductRepository::class
        ];
    }
}
