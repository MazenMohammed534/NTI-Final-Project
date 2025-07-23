@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Courses</h2>
    <a href="{{ route('course.create') }}" class="btn btn-primary">Add Course</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-striped table-bordered table-responsive">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Teacher</th>
            <th>Enrolled Students</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->course_id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->department->name ?? '-' }}</td>
                <td>{{ $course->teacher->full_name ?? '-' }}</td>
                <td>{{ $course->students->count() }}</td>
                <td>
                    <a href="{{ route('course.edit', $course->course_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('course.destroy', $course->course_id) }}" method="POST" class="d-inline">
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