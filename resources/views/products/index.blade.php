@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Product List</h2>

    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('products.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search products...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
    </div>
    
    @if ($products->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if ($product->picture)
                        <img src="{{ asset('storage/products/' . $product->picture) }}" alt="Product Image" style="width: 50px; height: 50px;"> <!-- Displaying the picture -->
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
    @else
    <p>No products found.</p>
    @endif
</div>
@endsection
