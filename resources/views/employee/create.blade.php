@extends('layouts.app')

@section('content')
<h2>Add Employee</h2>
<form action="{{ route('employee.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" name="position" id="position" class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label for="hire_date" class="form-label">Hire Date</label>
        <input type="date" name="hire_date" id="hire_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Add Employee</button>
    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 