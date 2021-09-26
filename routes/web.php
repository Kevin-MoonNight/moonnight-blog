<?php

use Illuminate\Support\Facades\Route;


// 將除了 api prefix 的 request 都導向 welcome.blade.php
Route::get('/{path}', function () {
    return view('layouts.index');
})->where('path', '^((?!api).)*$');

Route::get('/', function (){
    return view('layouts.index');
})->name('root');
