<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::post("/logout", [LogoutController::class, 'logout'])->name('logout');

//register
Route::get("/register", [RegisterController::class, 'index'])->name('register');
Route::post("/register", [RegisterController::class, 'store']);

//login
Route::get("/login", [LoginController::class, 'index'])->name('login');
Route::post("/login", [LoginController::class, 'store']);

//posts
Route::get("/posts", [PostController::class, 'index'])->name('posts');
Route::post("/posts", [PostController::class, 'store']);
Route::delete("/posts/{post}", [PostController::class, 'destroy'])->name('posts.destroy');
Route::get("/posts/{post}", [PostController::class, 'show'])->name('posts.show');

//likes
Route::post("/posts/{post}/likes", [PostLikeController::class, 'store'])->name('posts.like');
Route::delete("/posts/{post}/likes", [PostLikeController::class, 'destroy']);

//comments
Route::post("/posts/{post}/comments", [PostCommentController::class, 'store'])->name('posts.comment');
Route::delete("/posts/{comment}/comments", [PostCommentController::class, 'destroy']);

//post of user
Route::get("/users/{user:username}/posts", [UserPostController::class, 'index'])->name('user.posts');