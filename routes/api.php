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
    Route::delete('/comments/{id}', [CommentController::class, 'deleteAPI']);
    Route::get('/comments/{id}', [CommentController::class, 'getAPI']);
    Route::put('/comments/{id}', [CommentController::class, 'updateAPI']);
    Route::post('/comments', [CommentController::class, 'addAPI']);

    Route::delete('/tasks/{id}', [TaskController::class, 'deleteAPI']);
    Route::post('/tasks', [TaskController::class, 'addAPI']);
    Route::get('/protected-route', [ApiController::class, 'protectedRoute']);

});
