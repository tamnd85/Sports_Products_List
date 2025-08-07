@extends('layouts.app')

@section('title', 'The list of Sports products')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Sports Products</h1>
            <a href="{{ route('products.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                Add Product
            </a>
        </div>
        <div class="flex">
            <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex gap-4 items-center">
                <label for="filter" class="font-semibold text-gray-700">Filter:</label>
                <select name="filter" id="filter" onchange="this.form.submit()" class="border px-2 py-1 rounded">
                    <option value="">-- All Products --</option>
                    <option value="latest" {{ request('filter') === 'latest' ? 'selected' : '' }}>Latest</option>
                    <option value="rating" {{ request('filter') === 'rating' ? 'selected' : '' }}>Best Rated</option>
                    <option value="stock" {{ request('filter') === 'stock' ? 'selected' : '' }}>In Stock</option>
                </select>
            </form>
            <a href="{{ route('products.index') }}"
                class=" my-2 ml-4 text-sm text-blue-600 hover:underline">
                    Reset Filter
            </a>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            @switch(request('filter'))
                @case('rating')
                    Best Rated Products
                    @break
                @case('stock')
                    Products In Stock
                    @break
                @case('latest')
                    Latest Products
                    @break
                @default
                    All Products
            @endswitch
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="border rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300 bg-white">
                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        <h2 class="text-xl font-semibold text-blue-700 hover:underline @if ($product->stock == 0) line-through text-red-500 @endif">
                            {{ $product->name }}
                        </h2>
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="mt-2 w-full h-48 object-cover rounded">
                        @endif
                        <p class="mt-2 text-gray-600">Stock: {{ $product->stock }}</p>
                        <p class="text-sm text-gray-600">
                            Average rating:
                            <span class="font-semibold">
                                {{ number_format($product->reviews_avg_rating, 1) ?? 'N/A' }} / 5
                            </span>
                        </p>
                    </a>
                </div>
            @empty
                <div class="text-gray-500 col-span-full">There are no products!</div>
            @endforelse
        </div>

        @if ($products->count())
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
