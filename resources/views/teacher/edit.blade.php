@extends('layouts.app')

@section('content')
<h2>Edit Teacher</h2>
<form action="{{ route('teacher.update', $teacher->teacher_id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $teacher->full_name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ $teacher->phone }}">
    </div>
    <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" id="department_id" class="form-select">
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->department_id }}" {{ $teacher->department_id == $department->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Teacher</button>
    <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 