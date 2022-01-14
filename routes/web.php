<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


// 將除了 api prefix 的 request 都導向 welcome.blade.php
//Route::get('/{path}', function () {
//    return view('layouts.index');
//})->where('path', '^((?!api).)*$');

Route::get('/', function () {
    return view('frontend.index');
})->name('root');

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/contact', [MessagesController::class, 'create'])->name('contact');
Route::post('/message', [MessagesController::class, 'store'])->name('messages.store');

Route::middleware(['verified'])->prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::name('dashboard.')->group(function () {
        Route::resource('/articles', ArticlesController::class)->except('show');

        Route::name('articles.')->group(function () {
            Route::get('/articles/draft', [ArticlesController::class, 'draft'])->name('draft');
            Route::get('/articles/trashed', [ArticlesController::class, 'trashed'])->name('trashed');
            Route::get('/articles/restore/{trashed_article}', [ArticlesController::class, 'restore'])->name('restore');
            Route::delete('/articles/trashed/{trashed_article}', [ArticlesController::class, 'deleteTrashed'])->name('delete-trashed');
        });

        Route::resource('/tags', TagsController::class);
        Route::resource('/products', ProductsController::class);
        Route::resource('/messages', MessagesController::class)->except('create','store');

//    Route::get('/users', [UsersController::class, 'index'])->name('users.manage');
    });
});






