@extends('layouts.app')

@section('title', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')
    <form method="POST" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
        @csrf
        @isset($product)
            @method('PUT')
        @endisset

        <div class="mb-6">
            <label for="name" class="block mb-2 font-semibold text-gray-700">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $product->name ?? '') }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block mb-2 font-semibold text-gray-700">Description</label>
            <textarea
                name="description"
                id="description"
                rows="5"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
            >{{ old('description', $product->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="stock" class="block mb-2 font-semibold text-gray-700">Stock</label>
            <input
                type="number"
                name="stock"
                id="stock"
                value="{{ old('stock', $product->stock ?? '') }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stock') border-red-500 @enderror"
            >
            @error('stock')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="block mb-2 font-semibold text-gray-700">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                step="0.01"
                value="{{ old('price', $product->price ?? '') }}"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror"
            >
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="block mb-2 font-semibold text-gray-700">Product Image</label>
            <input
                type="file"
                name="image"
                id="image"
                class="w-full"
                accept="image/*"
            >
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            @isset($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mt-4 max-w-xs rounded">
            @endisset
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition"
            >
                @isset($product)
                    Update Product
                @else
                    Add Product
                @endisset
            </button>
            <a href="{{ route('products.index') }}" class="text-red-600 hover:underline font-semibold">Cancel</a>
        </div>
    </form>
@endsection
