<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

// Custom route to update product stock
Route::patch('/products/{product}/quantity', [ProductController::class, 'updateQuantity'])
    ->name('products.updateQuantity');
