<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\auth\GithubController;
use App\Http\Controllers\auth\GoogleController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
})->name('root');

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');

Route::post('/comments', [CommentsController::class, 'store'])
    ->middleware('verified')
    ->name('comments.store');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/contact', [MessagesController::class, 'create'])->name('contact');
Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');

Route::get('/auth/github/redirect', [GithubController::class, 'handleRedirect'])->name('auth.github.redirect');
Route::get('/auth/github/callback', [GithubController::class, 'handleCallback'])->name('auth.github.callback');

Route::get('/auth/google/redirect', [GoogleController::class, 'handleRedirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleCallback'])->name('auth.google.callback');

Route::fallback(function () {
    return view('errors.404');
});
