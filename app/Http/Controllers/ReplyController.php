<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Models\Reply;
use App\Http\Requests\ReplyRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReplyController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing all reviews.
     */
    public function index(Product $product, Review $review)
    {
        $replies = $review->replies()->latest()->get();

        return view('products.reviews.replies.index', compact('product', 'review', 'replies'));
    }

     /**
     * Show the form for creating a new resource.
     */
     public function create(Product $product, Review $review)
    {
        $this->authorize('create', [Reply::class, $review]);

        return view('products.reviews.replies.create', compact('product', 'review'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(ReplyRequest $request, Product $product, Review $review)
    {
        $this->authorize('create', [Reply::class, $review]);

        $data = $request->validated();
        $data['user_id'] = auth()->id(); // Asociar al usuario autenticado
        $review->replies()->create($data);

        return redirect()->route('products.reviews.show', [$product, $review]);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Review $review, Reply $reply)
    {
        $this->authorize('delete', $reply);

        $reply->delete();

        return redirect()->route('products.reviews.show', [$product, $review])
            ->with('success', 'Reply deleted successfully!');
    }

    /**
     * Display the specified review.
     */
    public function show(Product $product, Review $review, Reply $reply)
    {
        return view('products.reviews.replies.show', compact('product', 'review', 'reply'));
    }
}
