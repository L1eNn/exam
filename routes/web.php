<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update')->middleware('auth');

Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
