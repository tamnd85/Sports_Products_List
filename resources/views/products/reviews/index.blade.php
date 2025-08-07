@extends('layouts.app')

@section('title', 'Reviews for ' . $product->name)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Reviews for: <span class="text-blue-600">{{ $product->name }}</span>
            </h1>
            <a href="{{ route('products.show', $product) }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
                ← Back to Product
            </a>
        </div>

        <div class="flex">
            <form method="GET" action="{{ route('products.reviews.index', ['product' => $product->id]) }}" class="mb-6 flex gap-4 items-center">
                <label for="filter" class="font-semibold text-gray-700">Filter:</label>
                <select name="rating" id="filter" onchange="this.form.submit()" class="border px-2 py-1 rounded">
                    @for($i =1; $i<=5; $i++)
                        <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} {{ $i === 1 ? 'star' : 'stars' }}
                        </option>
                    @endfor
                </select>
            </form>

            <a href="{{ route('products.reviews.index', ['product' => $product->id]) }}"
            class=" my-2 ml-4 text-sm text-blue-600 hover:underline">
                Reset Filter
            </a>
        </div>


        @if ($reviews->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6">
                @foreach ($reviews as $review)
                    <div class="border rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300 bg-white">
                        <h2 class="text-xl font-semibold text-blue-700">
                            {{ $review->author }}
                        </h2>
                        <p class="text-gray-700 mt-2">{{ Str::limit($review->review, 150) }}</p>

                        <p class="text-sm text-gray-600 mt-2">
                            Rating: <span class="font-semibold text-yellow-500">{{ $review->rating }} / 5</span>
                        </p>

                        <a href="{{ route('products.reviews.show', ['product' => $product->id, 'review' => $review->id]) }}"
                           class="mt-3 inline-block text-blue-600 hover:underline font-semibold">
                            View Details →
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            @if (request('rating'))
                <p class="text-gray-600">There is no reviews with a rating of {{ request('rating') }} star{{ request('rating') == 1 ? '' : 's'}}.</p>
            @else
                <p class="text-gray-600">This product has no reviews yet.</p>
            @endif
        @endif
    </div>
@endsection
