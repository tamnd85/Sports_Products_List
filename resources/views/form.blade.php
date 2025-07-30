@extends('layouts.app')

@section('title', isset($product) ? 'Edit Product' :'Add Product')

@section('styles')
@endsection

@section('content')

    <form method="POST" action="{{ isset($product) ? route('products.update', ['product' => $product->id]) :route('products.store')}}">
        @csrf
        @isset($product)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="name">
                Name
            </label>
            <input text="text" name="name" id="name"
                @class(['border-red-500' =>$errors->has('name')])
                value="{{ $product->name ?? old('name') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description"
                @class(['border-red-500' =>$errors->has('decription')])
                rows="5">{{ $product->description ?? old('description')}} </textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="stock">
                Stock
            </label>
            <input type="number" name="stock" id="stock"
                @class(['border-red-500' =>$errors->has('stock')])
                value="{{ $product->stock ?? old('stock') }}">
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price">
                Price
            </label>
            <input type="number" step="0.01" name="price" id="price"
                @class(['border-red-500' =>$errors->has('price')])
                value="{{ $product->price ?? old('price') }}">
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="flex 1 items-center gap-2">
            <button type="submit" class="btn1">
                @isset($product)
                    Update Product
                @else
                    Add Product
                @endisset
            </button>
            <a href="{{ route('products.index') }}" class="link1">Cancel</a>
        </div>

    </form>
@endsection
