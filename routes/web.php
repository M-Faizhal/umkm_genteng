<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('layouts.app');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Categories Routes
    Route::resource('categories', CategoriesController::class);

    // Lists Routes
    Route::resource('lists', ListsController::class);

    // Users Routes
    Route::resource('users', UsersController::class);
});
