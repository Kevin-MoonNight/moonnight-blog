<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MessagesController;

// 將除了 api prefix 的 request 都導向 welcome.blade.php
//Route::get('/{path}', function () {
//    return view('index');
//})->where('path', '^((?!api).)*$');

Route::get('/', [PagesController::class,'index'])->name('root');

Route::resource('/articles',ArticlesController::class);

Route::get('/articles/tag/{name}', [ArticlesController::class,'searchTag'])->name('articleTag');
Route::post('/articles/search/', [ArticlesController::class,'search'])->name('articleSearch');
//Route::get('/articleControl',[PagesController::class,'articleControl'])->name('articleControl');

Route::resource('/products',ProductsController::class);

Route::resource('/contact',MessagesController::class);

Route::get('/dashboard', [PagesController::class,'dashboard'])->name('dashboard');

