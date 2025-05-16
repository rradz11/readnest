<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CommentController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:api')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{id}', [ArticleController::class, 'show']);

    Route::middleware(['auth:api', 'role:writer,admin'])->group(function () {
        Route::post('/', [ArticleController::class, 'store']); // Writer dan admin bisa buat
        Route::put('/{id}', [ArticleController::class, 'update']); // Writer dan admin bisa edit
    });

    Route::middleware(['auth:api', 'role:admin'])->group(function () {
        Route::delete('/{id}', [ArticleController::class, 'destroy']); // Hanya admin bisa hapus
    });

    Route::prefix('{articleId}/comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
        Route::middleware(['auth:api', 'role:reader,writer,admin'])->group(function () {
            Route::post('/', [CommentController::class, 'store']); // Reader, writer, admin bisa komentar
            Route::put('/{id}', [CommentController::class, 'update']);
            Route::delete('/{id}', [CommentController::class, 'destroy']);
        });
    });
});

Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('change-password', [AuthController::class, 'change-password']);
});
