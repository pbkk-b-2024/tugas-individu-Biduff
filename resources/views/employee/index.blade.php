@extends('layouts.main')

@section('content')
    <h1>Employee List</h1>

    <div class="d-flex justify-content-between mb-2">
        <form action="{{ route('employees.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Search employees...">
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </form>
        <a href="{{ route('employees.create') }}" class="btn btn-success">Create New Employee</a>
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
                <th>Position</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}
@endsection
