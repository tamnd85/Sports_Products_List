@extends('layouts.app')

@section('title', 'The list of Sports products')

@section('content')

    <nav>
        <a  class="link" href="{{ route('products.create') }}"> Add Product</a>
    </nav>
    @forelse ($products as $product)
        <div>
            <a href="{{ route('products.show', ['product' => $product->id]) }}"
                @class(['line-through' => $product->stock == 0])>{{ $product->name}}</a>
        </div>
    @empty
        <div>There are no products!</div>
    @endforelse

    @if ($products->count())
        <nav>{{ $products->links() }}</nav>
    @endif

@endsection
