<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/umkm/{id}', [HomeController::class, 'detail'])->name('umkm.detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/all-umkm', [HomeController::class, 'allUmkm'])->name('all.umkm');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// Admin Routes

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', CategoriesController::class);
    Route::resource('lists', ListsController::class);
});
