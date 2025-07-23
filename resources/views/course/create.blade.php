@extends('layouts.app')

@section('content')
<h2>Add Course</h2>
<form action="{{ route('course.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Course Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
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
    <div class="mb-3">
        <label for="teacher_id" class="form-label">Teacher</label>
        <select name="teacher_id" id="teacher_id" class="form-select">
            <option value="">Select Teacher</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->teacher_id }}">{{ $teacher->full_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Add Course</button>
    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 