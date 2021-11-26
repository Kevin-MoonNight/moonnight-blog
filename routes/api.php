<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/articles/popular', [ArticlesController::class, 'popular'])->name('articles.popular');
Route::get('/articles/draft', [ArticlesController::class, 'draft'])->name('articles.draft');
Route::get('/articles/trashed', [ArticlesController::class, 'trashed'])->name('articles.trashed');
Route::get('/articles/restore/{trashed_article}', [ArticlesController::class, 'restore'])->name('articles.restore');
Route::delete('/articles/trashed/{trashed_article}', [ArticlesController::class, 'deleteTrashed'])->name('articles.delete-trashed');

Route::get('/articles/getArticle/{article:slug}', [ArticlesController::class, 'getArticle'])->name('articles.get-article');
//由於php的限制put/patch 不法使用form-data獲得資料 所以只能用post再傳送
Route::post('/articles/{article:slug}', [ArticlesController::class, 'update'])->name('articles.update');
Route::apiResource('/articles', ArticlesController::class)->except('update');

//由於php的限制put/patch 不法使用form-data獲得資料 所以只能用post再傳送
Route::post('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::apiResource('/products', ProductsController::class)->except('update');
Route::put('/user/{user}',[UsersController::class,'updatePassword'])->name('users.update-password');

Route::apiResources([
    'tags' => TagsController::class,
    '/messages' => MessagesController::class,
    'users' => UsersController::class
]);
