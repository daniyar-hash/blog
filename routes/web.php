<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;

use App\Http\Controllers\Admin\DashboardController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});


// Route::get('/', HomeController::class)
//     ->name('home');

// Route::resource('posts', PostController::class)
//     ->only(['index', 'show']);

Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);

    // Route::post('/restore/{category}', [CategoryController::class, 'restore'])
    // ->name('categories.restore')->withTrashed();

    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
