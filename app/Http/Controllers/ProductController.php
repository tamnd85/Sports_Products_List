<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\QuantityRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $query = Product::query();

        // Load relation to calculate average rating if used later
        $query->withAvg('reviews', 'rating');

        // Filter based on selected option
        switch ($request->input('filter')) {
            case 'latest':
                $query->latest();
                break;

            case 'rating':
                $query->orderByDesc('reviews_avg_rating');
                break;

            case 'stock':
                $query->where('stock', '>', 0);
                break;

            default:
                $query->latest(); // default sorting
                break;
        }

        $products = $query->paginate(10);

        return view('products.index', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());

        return redirect()->route('products.show', $product)
            ->with('success', 'Product created succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }

    /**
     * // Custom update product stock
     */
    public function updateQuantity(QuantityRequest $request, Product $product)
    {
        $quantity = $request->validated()['quantity'];
        $quantityToDecrease = min($product->stock, $quantity);
        $product->decrement('stock', $quantityToDecrease);

        return redirect()->back()->with('success', 'Stock updated!');
    }

}
