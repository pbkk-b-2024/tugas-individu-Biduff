@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Category List</h2>

    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('categories.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search categories...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Create New Category</a>
    </div>
    
    @if ($categories->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
    @else
    <p>No categories found.</p>
    @endif
</div>
@endsection
