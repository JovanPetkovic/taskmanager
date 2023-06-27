<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [TaskController::class, 'index']);
Route::get('/task/{id}', [TaskController::class, 'show'])->name('task.show');

Route::get('/login', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/comment', [CommentController::class, 'addComment']);
Route::delete('/comment/{id}', [CommentController::class, 'delete'])->name('comment.delete')->middleware('auth:sanctum');
Route::get('/comments/{id}/edit', [CommentController::class, 'editShow'])->name('comment.edit');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comment.update');




