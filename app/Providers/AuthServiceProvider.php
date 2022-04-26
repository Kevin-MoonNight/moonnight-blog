<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Message;
use App\Models\Product;
use App\Models\Tag;
use App\Policies\ArticlePolicy;
use App\Policies\CommentPolicy;
use App\Policies\LikePolicy;
use App\Policies\MessagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\TagPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Comment::class => CommentPolicy::class,
        Message::class => MessagePolicy::class,
        Like::class => LikePolicy::class,
        Product::class => ProductPolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
