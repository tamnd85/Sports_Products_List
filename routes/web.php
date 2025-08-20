<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReplyController;

// Redirect root to products list
Route::get('/', fn() => redirect()->route('products.index'));

// --------------------------
// Public routes
// --------------------------
Route::resource('products', ProductController::class)
    ->only(['index', 'show']);

// Public reviews (list & show)
Route::resource('products.reviews', ReviewController::class)
    ->only(['index', 'show']);

// Public replies (list & show)
Route::resource('products.reviews.replies', ReplyController::class)
    ->only(['index', 'show']);

// --------------------------
// Authenticated user routes
// --------------------------
Route::middleware('auth')->group(function () {

    // Reviews: create, store, edit, update, destroy
    Route::resource('products.reviews', ReviewController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);

    // Update product stock
    Route::patch('/products/{product}/quantity', [ProductController::class, 'updateQuantity'])
        ->name('products.updateQuantity');
});

// --------------------------
// Admin-only routes
// --------------------------
Route::middleware('admin')->group(function () {

    // Full CRUD for products
    Route::resource('products', ProductController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);

    // Replies: create, store, destroy
    Route::resource('products.reviews.replies', ReplyController::class)
        ->only(['create', 'store', 'destroy']);
});
