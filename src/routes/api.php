<?php

use Illuminate\Support\Facades\Route;

use ReesMcIvor\Comments\Http\Controllers\Api as CommentApiControllers;

Route::middleware(['auth:sanctum'])->prefix('api')->group(function () {
    Route::get('comments', [CommentApiControllers\CommentsController::class, 'index'])->name('comments.index');
    Route::post('comments', [CommentApiControllers\CommentsController::class, 'store'])->name('comments.store');
});