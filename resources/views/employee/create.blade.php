@extends('layouts.main')

@section('content')
    <h1>Create Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
