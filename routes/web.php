<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlePageController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::get('/articles', [ArticlePageController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticlePageController::class, 'show'])->name('articles.show');
