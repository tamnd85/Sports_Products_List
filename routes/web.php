<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\QuantityRequest;
use Illuminate\Http\Response;


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

Route::post('/products' , function(ProductRequest $request) {

    $product = Product::create($request->validated());

    return redirect()->route('products.show' , ['product' => $product->id])
        ->with('success' , 'Product created successfully!');
})->name('products.store');

Route::put('/products/{product}' , function(Product $product, ProductRequest $request){

    $product->update($request->validated());

    return redirect()->route('products.show' , ['product' => $product->id])
        ->with('success' , 'Product updated successfully!');
})->name('products.update');

Route::delete('/products/{product}', function (Product $product) {

    $product->delete();

    return redirect()->route('products.index')
        ->with('sucess', 'Paroduct deleted succesfully!');
})->name('products.destroy');

Route:: patch('/products/{product}/quantity', function(QuantityRequest $request, Product $product) {
    $quantity = $request->validated()['quantity'];

    $quantityToDecrease = min($product->stock, $quantity);
    $product->decrement('stock', $quantityToDecrease);

    return redirect()->back()->with('success', 'Stock updated!');
})->name('products.updateQuantity');
