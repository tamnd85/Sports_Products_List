@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="link"><-Go back to products list!</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $product->description }}</p>

    <p>
        @if($product->stock===0)
        <span class="font-medium text-red-500"> There's no product available</span>
        @else
        <span class="font-medium text-green-500"> There's {{ $product->stock}} available</span>
        @endif
    </p>

    <p class="mb-4 text-slate-700">Price: {{ $product->price }} €</p>

    <div class="flex gap-2">
        <a href="{{ route('products.edit' , ['product' => $product] )}}"
            class="btn">Edit</a>

        <form action="{{route('products.destroy', ['product' => $product])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn2">Delete</button>
        </form>
        <form action="{{ route('products.updateQuantity', $product) }}" method="POST" class="flex gap-1">
            @csrf
            @method('PATCH')
            <input
                type="number"
                name="quantity"
                value="1"
                min="1"
                max="{{ $product->stock }}"
                class="w-16 border p-1">
            <button type="submit" class="btn1">Update</button>
        </form>
    </div>
@endsection
