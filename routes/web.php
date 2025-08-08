<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

// Custom route to update product stock
Route::patch('/products/{product}/quantity', [ProductController::class, 'updateQuantity'])
    ->name('products.updateQuantity');

// filter products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::resource('products.reviews', ReviewController::class);


