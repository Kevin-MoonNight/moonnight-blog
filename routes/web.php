<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
})->name('root');

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/contact', [MessagesController::class, 'create'])->name('contact');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');

Route::middleware(['verified'])->group(function () {
    Route::get('/user/password', function () {
        return view('users.update-password', ['user' => auth()->user()]);
    });

    Route::get('user/profile-information', function () {
        return view('users.update-profile-information', ['user' => auth()->user()]);
    });

    Route::prefix('/dashboard')->group(function () {
        Route::get('/', function () {
            return view('backend.dashboard');
        })->name('dashboard');

        Route::name('dashboard.')->group(function () {
            Route::resource('/articles', ArticlesController::class)->except('index', 'show');

            Route::name('articles.')->group(function () {
                Route::get('/articles', [ArticlesController::class, 'dashboard'])->name('index');
                Route::get('/articles/draft', [ArticlesController::class, 'draft'])->name('draft');
                Route::get('/articles/trashed', [ArticlesController::class, 'trashed'])->name('trashed');
                Route::get('/articles/restore/{trashed_article}', [ArticlesController::class, 'restore'])->name('restore');
                Route::delete('/articles/forceDelete/{trashed_article}', [ArticlesController::class, 'forceDelete'])->name('force-delete');
            });

            Route::resource('/tags', TagsController::class)->except('index', 'show');
            Route::get('/tags', [TagsController::class, 'dashboard'])->name('tags.index');
            Route::resource('/products', ProductsController::class)->except('index', 'show');
            Route::get('/products', [ProductsController::class, 'dashboard'])->name('products.index');

            Route::resource('/messages', MessagesController::class)->except('create', 'store');

            Route::middleware(['password.confirm'])->group(function () {
                Route::resource('/users', UsersController::class)->except('create', 'store');
            });
        });
    });
});


