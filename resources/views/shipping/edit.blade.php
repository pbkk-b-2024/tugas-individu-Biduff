@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Shipping</h2>
    <form action="{{ route('shippings.update', $shipping->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $shipping->address }}" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" value="{{ $shipping->city }}" required>
        </div>
        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code</label>
            <input type="text" name="postal_code" class="form-control" value="{{ $shipping->postal_code }}" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" value="{{ $shipping->country }}" required>
        </div>
        <div class="mb-3">
            <label for="order_id" class="form-label">Order</label>
            <select name="order_id" class="form-control" required>
                <option value="">Select Order</option>
                @foreach($orders as $order)
                <option value="{{ $order->id }}" @if($order->id == $shipping->order_id) selected @endif>{{ $order->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
