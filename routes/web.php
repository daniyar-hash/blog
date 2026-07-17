<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\Personal\DashboardController;

// Route::get('/', function () {

//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Route::resource('posts', PostController::class)
//     ->only(['index', 'show']);

Route::middleware(['auth', 'admin','verified'])->prefix('admin')->as('admin.')->group(function () {

    Route::get('/', AdminDashboard::class)->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
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


