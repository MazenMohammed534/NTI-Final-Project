@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Employees</h2>
    <a href="{{ route('employee.create') }}" class="btn btn-primary">Add Employee</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-striped table-bordered table-responsive">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Hire Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->hire_date }}</td>
                <td>
                    <a href="{{ route('employee.edit', $employee->employee_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('employee.destroy', $employee->employee_id) }}" method="POST" class="d-inline">
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