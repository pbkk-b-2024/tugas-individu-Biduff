@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Customer List</h2>
    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('customers.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search customers...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Create New Customer</a>
    </div>

    @if ($customers->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }}
    @else
    <p>No customers found.</p>
    @endif
</div>
@endsection
