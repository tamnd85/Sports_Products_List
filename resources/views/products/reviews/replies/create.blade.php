@extends('layouts.app')

@section('title', 'Reply to Review')

@section('content')
    <form method="POST" action="{{ route('products.reviews.replies.store', ['product' => $product->id, 'review' => $review->id]) }}"
          class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
        @csrf

        <div class="mb-6">
            <label for="author" class="block mb-2 font-semibold text-gray-700">Name</label>
            <input
                type="text"
                name="author"
                id="author"
                value="{{ old('author', auth()->user()->name ?? 'Admin') }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('author') border-red-500 @enderror"
            >
            @error('author')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="block mb-2 font-semibold text-gray-700">Reply</label>
            <textarea
                name="content"
                id="content"
                rows="5"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror"
            >{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition"
            >
                Submit Reply
            </button>

            <a href="{{ route('products.reviews.show', ['product' => $product->id, 'review' => $review->id]) }}"
               class="text-red-600 hover:underline font-semibold">
                Cancel
            </a>
        </div>
    </form>
@endsection
