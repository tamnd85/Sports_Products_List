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
