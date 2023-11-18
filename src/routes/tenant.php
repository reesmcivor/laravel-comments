<?php

use Illuminate\Support\Facades\Route;

use ReesMcIvor\Comments\Http\Controllers\Api as CommentApiControllers;

Route::middleware([
    'api',
    'auth:sanctum',
])->group(function () {

    Route::prefix('api')->name('api.')->group(function() {
        Route::get('comments', [CommentApiControllers\CommentsController::class, 'index'])->name('conversations.index');
        Route::post('comments', [CommentApiControllers\CommentsController::class, 'store'])->name('conversations.store');
    });
});