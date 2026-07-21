<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Post\CommentController as PostCommentController;

use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\Personal\DashboardController;

use App\Http\Controllers\Post\PostController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::prefix('posts')->as('post.')->group(function(){

    Route::get('/', [PostController::class, 'index'])
        ->name('index');

    Route::get('/{post}', [PostController::class, 'show'])
        ->name('show');

    Route::post('/{post}/comments', [PostCommentController::class, 'store'])->name('comment.store');
});



// Route::resource('posts', PostController::class)
//     ->only(['index', 'show']);

Route::middleware(['auth', 'admin','verified'])->prefix('admin')->as('admin.')->group(function () {

    Route::get('/', AdminDashboardController::class)->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/users', UserController::class);
    // Route::post('/restore/{category}', [CategoryController::class, 'restore'])
    // ->name('categories.restore')->withTrashed();

    
});

Route::middleware(['auth','verified'])->prefix('personal')->as('personal.')->group(function () {

    Route::get('/main', DashboardController::class)->name('dashboard');
    Route::resource('/likeds', LikedController::class)->parameters(['likeds' => 'post']);
    Route::resource('/comments', CommentController::class);
   
    
});


Auth::routes(['verify' => true]);


