@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Teachers</h2>
    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Add Teacher</a>
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
            <th>Phone</th>
            <th>Department</th>
            <th>Courses</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->teacher_id }}</td>
                <td>{{ $teacher->full_name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->department->name ?? '-' }}</td>
                <td>
                    @if($teacher->courses->count())
                        {{ $teacher->courses->pluck('name')->implode(', ') }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('teacher.edit', $teacher->teacher_id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teacher.destroy', $teacher->teacher_id) }}" method="POST" class="d-inline">
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