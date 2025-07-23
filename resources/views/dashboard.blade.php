@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard</h2>
<div class="dashboard-cards mb-4">
    <div class="card dashboard-card text-bg-primary">
        <div class="card-body">
            <h5 class="card-title">Total Teachers</h5>
            <p class="card-text display-6">{{ $teacherCount }}</p>
        </div>
    </div>
    <div class="card dashboard-card text-bg-success">
        <div class="card-body">
            <h5 class="card-title">Total Students</h5>
            <p class="card-text display-6">{{ $studentCount }}</p>
        </div>
    </div>
    <div class="card dashboard-card text-bg-info">
        <div class="card-body">
            <h5 class="card-title">Total Employees</h5>
            <p class="card-text display-6">{{ $employeeCount }}</p>
        </div>
    </div>
    <div class="card dashboard-card text-bg-warning">
        <div class="card-body">
            <h5 class="card-title">Total Departments</h5>
            <p class="card-text display-6">{{ $departmentCount }}</p>
        </div>
    </div>
    <div class="card dashboard-card text-bg-danger">
        <div class="card-body">
            <h5 class="card-title">Total Courses</h5>
            <p class="card-text display-6">{{ $courseCount }}</p>
        </div>
    </div>
</div>
@endsection 