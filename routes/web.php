<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products', function ()  {
    return view('index', [
    'products'=> Product::latest()->paginate()
    ]);
})->name('products.index');

Route::view('/products/create', 'create')
    ->name('products.create');

Route::get('/products/{product}/edit', function (Product $product) {
    return view('edit', [
        'product' => $product
    ]);
})->name('products.edit');

Route::get('/products/{product}', function (Product $product) {
    return view('show', [
        'product' => $product
    ]);
})->name('products.show');
