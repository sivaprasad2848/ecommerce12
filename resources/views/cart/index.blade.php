@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container mt-4">
    <h2>Your Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart))
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price (₹)</th>
                    <th>Quantity</th>
                    <th>Total (₹)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['productName'] }}</td>
                        <td>{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $item['product_id']) }}">
                                @csrf
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Grand Total</strong></td>
                    <td colspan="2"><strong>₹{{ number_format($total, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button class="btn btn-warning">Clear Cart</button>

        </form>
        <a href="{{ route('checkout.show') }}" class="btn btn-primary">Proceed to Checkout</a>

    @else
        <p class="text-muted">Your cart is empty.</p>
    @endif
</div>
@endsection
