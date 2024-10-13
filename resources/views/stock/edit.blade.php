@extends('layouts.main')

@section('content')
    <h1>Edit Stock</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="" disabled>Select a product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $stock->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $stock->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="last_updated">Last Updated:</label>
            <input type="date" name="last_updated" id="last_updated" class="form-control" value="{{ $stock->last_updated }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Stock</button>
    </form>
@endsection
