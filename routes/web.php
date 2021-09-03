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

Route::get('/', function (){
    return view('frontend.home');
})->name('root');

Route::resource('/articles',ArticlesController::class);

Route::get('/articles/tag/{name}', [ArticlesController::class,'searchTag'])->name('articleTag');
Route::post('/articles/search/', [ArticlesController::class,'search'])->name('articleSearch');
Route::get('/dashboard/articles',[ArticlesController::class,'control'])->name('articleControl');

Route::get('/dashboard/messages',[MessagesController::class,'index'])->name('messageControl');
Route::resource('/contact',MessagesController::class);

Route::resource('/products',ProductsController::class);


Route::get('/dashboard', function (){
    return view('backend.dashboard');
})->middleware('auth')->name('dashboard');

Route::fallback(function (){
    return redirect('/');
});
