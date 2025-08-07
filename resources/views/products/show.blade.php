@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <a href="{{ route('products.show', $product) }}"
            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition duration-200">
            ← Back to Product List
        </a>
    </div>

    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>

    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-72 object-cover rounded shadow mb-6">

    <p class="mb-6 text-gray-700">{{ $product->description }}</p>

    <p class="mb-4">
        @if($product->stock === 0)
            <span class="font-semibold text-red-600">There's no product available</span>
        @else
            <span class="font-semibold text-green-600">There are {{ $product->stock }} available</span>
        @endif
    </p>

    <p class="mb-6 text-lg font-semibold text-gray-800">Price: <span class="text-blue-600">{{ $product->price }} €</span></p>
    <div class="flex flex-wrap gap-4">
        <p class="mb-6 text-lg font-semibold text-gray-800">
            Average rating:
            <span class="text-blue-600">
                {{ number_format($product->reviews_avg_rating, 1) ?? 'N/A' }} / 5
            </span>
        </p>
        <a href="{{ route('products.reviews.index', ['product' => $product->id, 'review']) }}"
            class="btn  h-10 bg-blue-600 text-white hover:bg-blue-700 transition">
            Show Reviews
        </a>
        <a href="{{ route('products.reviews.create', ['product' => $product->id, 'review']) }}"
            class="btn  h-10 bg-blue-600 text-white hover:bg-blue-700 transition">
            Add a Review
        </a>
    </div>

    <div class="flex flex-wrap gap-4">
        <a href="{{ route('products.edit', ['product' => $product]) }}"
           class="btn bg-blue-600 text-white hover:bg-blue-700 transition">
           Edit
        </a>

        <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn2 bg-red-600 text-white hover:bg-red-700 transition">
                Delete
            </button>
        </form>

        <form action="{{ route('products.updateQuantity', $product) }}" method="POST" class="flex items-center gap-2">
            @csrf
            @method('PATCH')
            <label for="quantity" class="font-medium text-gray-700">Update stock:</label>
            <input
                id="quantity"
                type="number"
                name="quantity"
                value="1"
                min="1"
                max="{{ $product->stock }}"
                class="w-20 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button type="submit" class="btn1 bg-green-600 text-white hover:bg-green-700 transition">
                Update
            </button>
        </form>

    </div>
</div>
@endsection
