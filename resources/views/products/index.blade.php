@extends('layouts.app') <!-- Assuming you're using a layout file -->

@section('title', 'All Products')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">All Products</h2>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->productName }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">₹{{ number_format($product->price, 2) }}</h6>
                        <p class="card-text">
                            {{ Str::limit($product->description, 100) }}
                        </p>
                        <span class="badge bg-secondary">Stock: {{ $product->stock }}</span>
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary btn-sm">View</a>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary mt-2">Add to Cart</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No products available.</p>
        @endforelse
    </div>
</div>
@endsection
