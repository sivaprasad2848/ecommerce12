@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
<div class="container mt-4">
    <h2>Checkout</h2>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email (optional)</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone *</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Address *</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <h5>Cart Total: ₹{{ number_format($total, 2) }}</h5>

        <button class="btn btn-success mt-3" type="submit">Place Order</button>
    </form>
</div>
@endsection
