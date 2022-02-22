<?php

use App\Http\Controllers\LikesController;
use Illuminate\Support\Facades\Route;

Route::post('/likes',[LikesController::class,'store'])->name('likes.store');
Route::delete('/likes/{article}',[LikesController::class,'destroy'])->name('likes.destroy');
