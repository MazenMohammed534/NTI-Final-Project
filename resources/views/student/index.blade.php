@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Students</h2>
    <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-striped table-bordered table-responsive">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Courses</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->department->name ?? '-' }}</td>
                <td>
                    @if($student->courses->count())
                        {{ $student->courses->pluck('name')->implode(', ') }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('student.edit', $student->student_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('student.destroy', $student->student_id) }}" method="POST" class="d-inline">
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