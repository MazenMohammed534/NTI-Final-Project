@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Departments</h2>
    <a href="{{ route('department.create') }}" class="btn btn-primary">Add Department</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-striped table-bordered table-responsive">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->department_id }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <a href="{{ route('department.edit', $department->department_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('department.destroy', $department->department_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection 