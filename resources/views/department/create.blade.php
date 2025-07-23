@extends('layouts.app')

@section('content')
<h2>Add Department</h2>
<form action="{{ route('department.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Department Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Department</button>
    <a href="{{ route('department.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection 