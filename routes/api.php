<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/tasks', [TaskController::class, 'indexAPI']);

Route::middleware('auth:api')->group(function () {
    Route::delete('/comments/{id}', [CommentController::class, 'deleteAPI'])->name('comment.delete');
    Route::get('/comments/{id}', [CommentController::class, 'getCommentAPI'])->name('comment.get');
    Route::get('/protected-route', [ApiController::class, 'protectedRoute']);

});
