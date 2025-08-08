@extends('layouts.app')

@section('title', 'Reviews from ' . $review->author)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex mb-6 gap-20">
        <a href="{{ route('products.show', $product) }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
            ← Back to Product
        </a>
        <a href="{{ route('products.reviews.index', $product) }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
            ← Back to Reviews
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-6">Review from {{ $review->author }}</h1>
    <div class="bg-white p-6 rounded-lg shadow-md mb-4">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-semibold">{{ $review->author }}</h2>
            <span class="text-yellow-500 font-bold">Rating: {{ $review->rating }}/5</span>
        </div>
        <p class="text-gray-700">{{ $review->review }}</p>
        <div class="mt-4 text-sm text-gray-500">
            Posted on {{ $review->created_at->format('F j, Y') }}
        </div>
    </div>

    <div class="flex flex-wrap gap-4 mb-6">
        <a href="{{ route('products.reviews.edit', ['product' => $product->id, 'review' => $review->id]) }}"
           class="btn h-10 bg-blue-600 text-white hover:bg-blue-700 transition">
            Edit Review
        </a>

        <form action="{{ route('products.reviews.destroy', ['product' => $product, 'review' => $review->id]) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this review?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn2 bg-red-600 text-white hover:bg-red-700 transition">
                Delete
            </button>
        </form>

        <a href="{{ route('products.reviews.replies.create', ['product' => $product->id, 'review' => $review->id]) }}"
           class="btn h-10 bg-blue-600 text-white hover:bg-blue-700 transition">
            Add a Reply
        </a>

    </div>


</div>
@endsection
