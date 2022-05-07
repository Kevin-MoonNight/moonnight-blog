<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
})->name('root');

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/contact', [MessagesController::class, 'create'])->name('contact');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');

//Route::middleware(['verified'])->group(function () {
//    Route::get('/user/password', function () {
//        return view('users.update-password', ['user' => auth()->user()]);
//    });
//
//    Route::get('user/profile-information', function () {
//        return view('users.update-profile-information', ['user' => auth()->user()]);
//    });
//});

Route::redirect('dashboard/login', '/login', 301);

Route::fallback(function () {
    return view('errors.404');
});
