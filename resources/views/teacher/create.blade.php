@extends('layouts.app')

@section('content')
<h2>Add Teacher</h2>
<form action="{{ route('teacher.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" required>
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
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" id="department_id" class="form-select">
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->department_id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Add Teacher</button>
    <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 