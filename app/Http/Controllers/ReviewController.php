<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing all reviews.
     */
    public function index(Product $product, Request $request)
    {
        $query = $product->reviews();

        //filter by an specific rating

        if($request->filled('rating')){
            $query->where('rating', $request->input('rating'));
        }

        // filter by date
        $query->orderBy('created_at', 'desc');

        $reviews = $query->paginate(10);

        return view('products.reviews.index', compact('product', 'reviews'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('products.reviews.create', ['product'=> $product]);
    }

    /**
     * Store a newly created resource in storage.
     */


public function store(ReviewRequest $request, Product $product)
{
    $data = $request->validated();
    $product->reviews()->create($data);

    return redirect()->route('products.reviews.index', $product);
}


    /**
     * Display the specified review.
     */
    public function show(Product $product, Review $review)
    {
        return view('products.reviews.show', compact('product', 'review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, review $review)
    {
        return view('products.reviews.edit', compact('product', 'review'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(ReviewRequest $request, Product $product, Review $review)
{
    $review->update($request->validated());

    return redirect()->route('products.reviews.show', [$product, $review]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Review $review)
    {
        $review->delete();

        return redirect()->route('products.reviews.index')
            ->with('success', 'Review deleted successfully!');
    }
}
