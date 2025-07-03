<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('layouts.app');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Categories Routes
    Route::resource('categories', CategoriesController::class);

    // Lists Routes
    Route::resource('lists', ListsController::class);

    // Users Routes
    Route::resource('users', UsersController::class);
});
