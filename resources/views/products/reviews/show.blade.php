@extends('layouts.app')

@section('title', 'Reviews for ' . $product->name)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">&larr; Back to product</a>
    </div>

    <h1 class="text-3xl font-bold mb-6">Reviews for "{{ $product->name }}"</h1>

    @forelse($product->reviews as $review)
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
    @empty
        <p class="text-gray-600">No reviews yet for this product.</p>
    @endforelse
</div>
@endsection
