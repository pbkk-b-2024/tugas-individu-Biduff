@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Shipping List</h2>

    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('shippings.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search shippings...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('shippings.create') }}" class="btn btn-success">Create New Shipping</a>
    </div>

    @if ($shippings->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shippings as $shipping)
            <tr>
                <td>{{ $shipping->id }}</td>
                <td>{{ $shipping->address }}</td>
                <td>{{ $shipping->city }}</td>
                <td>{{ $shipping->postal_code }}</td>
                <td>{{ $shipping->country }}</td>
                <td>{{ $shipping->order_id }}</td>
                <td>
                    <a href="{{ route('shippings.edit', $shipping->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('shippings.destroy', $shipping->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $shippings->links() }}
    @else
    <p>No shippings found.</p>
    @endif
</div>
@endsection