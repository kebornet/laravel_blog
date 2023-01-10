<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PostController::class, 'index']);

Route::get('posts/index', [PostController::class, 'index'])->name('post.index');
Route::get('post/show/{id}', [PostController::class, 'show'])->name('post.show');

Auth::routes(['verify' => true]);
Route::get('admin/index', [IndexController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('admin/posts/index', [AdminPostController::class, 'index'])->name('admin.post.index')->middleware('auth');
Route::get('admin/post/show/{id}', [AdminPostController::class, 'show'])->name('admin.post.show')->middleware('auth');
Route::get('admin/post/create', [AdminPostController::class, 'create'])->name('admin.post.create')->middleware('auth');
Route::post('admin/post/store', [AdminPostController::class, 'store'])->name('admin.post.store')->middleware('auth');
Route::get('admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.post.edit')->middleware('auth');
Route::patch('admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin.post.update')->middleware('auth');
Route::delete('admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin.post.delete')->middleware('auth');

Route::get('admin/comments/index', [CommentController::class, 'index'])->name('admin.comment.index')->middleware('auth');
Route::get('admin/comment/create', [CommentController::class, 'create'])->name('admin.comment.create')->middleware('auth');
Route::post('admin/comment/{post_id}/store', [CommentController::class, 'store'])->name('admin.comment.store')->middleware('auth');
Route::get('admin/comment/edit/{id}', [CommentController::class, 'edit'])->name('admin.comment.edit')->middleware('auth');
Route::patch('admin/comment/update/{id}', [CommentController::class, 'update'])->name('admin.comment.update')->middleware('auth');
Route::delete('admin/comment/delete/{id}', [CommentController::class, 'delete'])->name('admin.comment.delete')->middleware('auth');

Route::post('comment-like/{comment_id}/store', [LikeController::class, 'store'])->name('comment-like.store')->middleware('auth');