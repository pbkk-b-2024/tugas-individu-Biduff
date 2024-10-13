@extends('layouts.main')

@section('content')
    <h1>Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $employee->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" value="{{ $employee->position }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" value="{{ $employee->salary }}" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
