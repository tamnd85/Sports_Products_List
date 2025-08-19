@extends('layouts.app')

@section('title', 'Replies for Review by ' . $review->author)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Replies for Review by {{ $review->author }}</h1>

    <div class="mb-4">
        <a href="{{ route('products.reviews.show', ['product' => $product->id, 'review' => $review->id]) }}"
           class="text-blue-600 hover:underline">← Back to Review</a>
    </div>

   <div class="p-4 border rounded mb-3 bg-white shadow-sm">
        <p class="font-semibold">Author: {{ $reply->author }}</p>
        <p class="mt-2 text-gray-700">Content: {{ $reply->content }}</p>
        <p class="text-xs text-gray-500 mt-1">{{ $reply->created_at->diffForHumans() }}</p>
    </div>
</div>
@endsection

