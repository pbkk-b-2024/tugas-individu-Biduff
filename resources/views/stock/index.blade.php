@extends('layouts.main')

@section('content')
    <h1>Stock List</h1>

    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('stocks.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search stocks...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('stocks.create') }}" class="btn btn-success">Create New Stock</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->last_updated }}</td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $stocks->links() }}
@endsection
