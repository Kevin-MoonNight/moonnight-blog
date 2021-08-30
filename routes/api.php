<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('/tags',TagsController::class);
//Route::get('/tags/search/{name}',[TagsController::class,'search']);
//
//Route::apiResource('/articles',ArticlesController::class);
//Route::get('/articles/search/{name}',[ArticlesController::class,'search']);
//Route::get('/articles/tag/{name}',[ArticlesController::class,'searchTag']);
//
//Route::apiResource('contact',MessageController::class);
//
////確認使用者登入狀態
//Route::get('/authCheck',[AuthController::class,'authCheck']);
