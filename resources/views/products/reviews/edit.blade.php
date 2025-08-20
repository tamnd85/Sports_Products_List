@extends('layouts.app')

@section('content')

    @can('edit', App\Models\Review::class)

        @include('reviewsform')

    @else
        <p class="text-muted">You should be registered.</p>

    @endcan

@endsection
