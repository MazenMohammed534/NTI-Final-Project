@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>
<form action="{{ route('student.update', $student->student_id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="full_name" class="form-label">Full Name</label>
        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $student->full_name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" id="age" class="form-control" value="{{ $student->age }}">
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select">
            <option value="">Select Gender</option>
            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" id="department_id" class="form-select">
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->department_id }}" {{ $student->department_id == $department->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="courses" class="form-label">Courses</label>
        <select name="courses[]" id="courses" class="form-select" multiple>
            @foreach($courses as $course)
                <option value="{{ $course->course_id }}" {{ $student->courses->contains('course_id', $course->course_id) ? 'selected' : '' }}>{{ $course->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Student</button>
    <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 