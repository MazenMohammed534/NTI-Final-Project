<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/Button/Button.css') }}" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: #f8f9fa;
        }
        .sidebar {
            min-width: 220px;
            max-width: 220px;
            background: #343a40;
            color: #fff;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #495057;
            color: #fff;
        }
        .dashboard-cards {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .dashboard-card {
            flex: 1 1 200px;
            min-width: 200px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar d-flex flex-column p-3">
        <h2 class="mb-4">CAMPUS</h2>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ route('employee.index') }}" class="nav-link {{ request()->routeIs('employee.*') ? 'active' : '' }}">Employees</a></li>
            <li><a href="{{ route('teacher.index') }}" class="nav-link {{ request()->routeIs('teacher.*') ? 'active' : '' }}">Teachers</a></li>
            <li><a href="{{ route('student.index') }}" class="nav-link {{ request()->routeIs('student.*') ? 'active' : '' }}">Students</a></li>
            <li><a href="{{ route('department.index') }}" class="nav-link {{ request()->routeIs('department.*') ? 'active' : '' }}">Departments</a></li>
            <li><a href="{{ route('course.index') }}" class="nav-link {{ request()->routeIs('course.*') ? 'active' : '' }}">Courses</a></li>
        </ul>
    </nav>
    <main class="flex-grow-1 p-4">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>