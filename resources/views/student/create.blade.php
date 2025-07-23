@extends('layouts.app')

@section('content')
<h2>Add Student</h2>
<form action="{{ route('student.store') }}" method="POST" class="mt-3">
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
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" id="age" class="form-control">
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
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
        <label for="courses" class="form-label">Courses</label>
        <select name="courses[]" id="courses" class="form-select" multiple>
            @foreach($courses as $course)
                <option value="{{ $course->course_id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Add Student</button>
    <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 