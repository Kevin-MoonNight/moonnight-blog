<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Route::post('/login', [AuthController::class, 'login']);
//Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
//Route::post('/register', [AuthController::class, 'register']);

Route::get('/articles/popular', [ArticlesController::class, 'popular']);
Route::get('/articles/draft', [ArticlesController::class, 'draft']);
Route::get('/articles/trashed', [ArticlesController::class, 'trashed']);
Route::get('/articles/restore/{article}', [ArticlesController::class, 'restore']);
Route::delete('/articles/deleteTrashed/{article}',[ArticlesController::class,'deleteTrashed']);
//由於php的限制put/patch 不法使用form-data獲得資料 所以只能用post再傳送
Route::post('/articles/{article}', [ArticlesController::class, 'update']);
Route::apiResource('/articles', ArticlesController::class)->except('update')->scoped([
    'article' => 'slug'
]);

Route::apiResources([
    '/messages' => MessagesController::class,
    '/tags' => TagsController::class,
    '/products' => ProductsController::class
]);
