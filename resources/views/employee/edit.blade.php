@extends('layouts.app')

@section('content')
<h2>Edit Employee</h2>
<form action="{{ route('employee.update', $employee->employee_id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $employee->full_name }}" required>
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" name="position" id="position" class="form-control" value="{{ $employee->position }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}">
    </div>
    <div class="mb-3">
        <label for="hire_date" class="form-label">Hire Date</label>
        <input type="date" name="hire_date" id="hire_date" class="form-control" value="{{ $employee->hire_date }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Employee</button>
    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 