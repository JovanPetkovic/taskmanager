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
Route::get('/task/{id}', [TaskController::class, 'show'])->name('task.show')->middleware('auth');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/comment', [CommentController::class, 'addComment'])->middleware('auth');
Route::delete('/comment/{id}', [CommentController::class, 'delete'])->name('comment.delete')->middleware('auth');
Route::get('/comments/{id}/edit', [CommentController::class, 'editShow'])->name('comment.edit')->middleware('auth');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comment.update')->middleware('auth');




