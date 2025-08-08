@extends('layouts.app')

@section('title', 'Replies for Review')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="flex gap-4 mb-6">
        <a href="{{ route('products.reviews.show', [$product, $review]) }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
            ← Back to Review
        </a>
        <a href="{{ route('products.reviews.index', $product) }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
            ← Back to Reviews
        </a>
    </div>

    <h2 class="text-3xl font-bold mb-6">Replies for Review by "{{ $review->author }}"</h2>

    @if ($replies->isEmpty())
        <p class="text-gray-500">No replies yet.</p>
    @else
        <ul class="space-y-4">
            @foreach ($replies as $reply)
                <li class="p-4 border rounded shadow bg-white">
                    <p class="font-semibold">{{ $reply->author }}</p>
                    <p class="text-gray-700">{{ $reply->content }}</p>

                    <form method="POST" action="{{ route('products.reviews.replies.destroy', [$product, $review, $reply]) }}" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn2 bg-red-600 text-white hover:bg-red-700 transition" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="mt-6">
        <a href="{{ route('products.reviews.replies.create', [$product, $review]) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Add Reply
        </a>
    </div>
</div>
@endsection
