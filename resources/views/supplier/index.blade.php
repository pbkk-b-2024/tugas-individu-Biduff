@extends('layouts.main')

@section('content')
    <h1>Supplier List</h1>

    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('suppliers.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search suppliers...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('suppliers.create') }}" class="btn btn-success">Create New Supplier</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $suppliers->links() }}
@endsection
