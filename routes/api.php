<?php

use App\Http\Controllers\ArticlesAPIController;
use App\Http\Controllers\MessagesAPIController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::post('/register',[AuthController::class,'register']);
Route::post('/isAuth',[AuthController::class,'isAuth']);

Route::get('/articles/popular',[ArticlesAPIController::class,'popular']);
Route::apiResource('/articles',ArticlesAPIController::class);
Route::get('/articles/search/{text}',[ArticlesAPIController::class,'search']);
Route::get('/articles/tag/{name}',[ArticlesAPIController::class,'searchTag']);


Route::apiResource('/messages',MessagesAPIController::class);

Route::apiResource('/tags', TagsController::class);
