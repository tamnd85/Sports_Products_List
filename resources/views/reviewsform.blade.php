@extends('layouts.app')

@section('title', isset($review) ? 'Edit Review' : 'Add Review')

@section('content')
    <form method="POST" action="{{ isset($review) ? route('products.reviews.update', ['product' => $product->id, 'review' => $review->id]) : route('products.reviews.store', ['product' => $product->id]) }}" class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
        @csrf
        @isset($review)
            @method('PUT')
        @endisset

        <div class="mb-6">
            <label for="author" class="block mb-2 font-semibold text-gray-700">Name</label>
            <input
                type="text"
                name="author"
                id="author"
                value="{{ old('author', $review->author ?? '') }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('author') border-red-500 @enderror"
            >
            @error('author')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="review" class="block mb-2 font-semibold text-gray-700">Description</label>
            <textarea
                name="review"
                id="review"
                rows="5"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('review') border-red-500 @enderror"
            >{{ old('review', $review->review ?? '') }}</textarea>
            @error('review')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="rating" class="block mb-2 font-semibold text-gray-700">Rating</label>
            <input
                type="number"
                name="rating"
                id="rating"
                value="{{ old('rating', $review->rating ?? '') }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('rating') border-red-500 @enderror"
            >
            @error('rating')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition"
            >
                @isset($review)
                    Update Review
                @else
                    Add Review
                @endisset
            </button>

            <a href="{{ isset($review)
                ? route('products.reviews.show', ['product' => $product->id, 'review'=> $review->id])
                : route('products.show', $product->id)
            }}" class="text-red-600 hover:underline font-semibold">
                Cancel
            </a>
        </div>
    </form>
@endsection
