@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl bg-white rounded-lg shadow-md">
    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="link text-blue-600 hover:underline">&larr; Go back to products list!</a>
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
