@extends('layouts.app')

@section('content')
<h2>Edit Department</h2>
<form action="{{ route('department.update', $department->department_id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Department Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $department->name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Department</button>
    <a href="{{ route('department.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 