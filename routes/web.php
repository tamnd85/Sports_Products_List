<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReplyController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

// Custom route to update product stock
Route::patch('/products/{product}/quantity', [ProductController::class, 'updateQuantity'])
    ->name('products.updateQuantity');

// filter products
//Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::resource('products.reviews', ReviewController::class);
    //reply reviews
    Route::get('/products/{product}/reviews/{review}/reply', [ReviewController::class, 'replyForm'])->name('products.reviews.replyForm');
    Route::post('/products/{product}/reviews/{review}/reply', [ReviewController::class, 'storeReply'])->name('products.reviews.storeReply');

Route::resource('products.reviews.replies', ReplyController::class);

