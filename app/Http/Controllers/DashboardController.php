<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $teacherCount = Teacher::count();
        $studentCount = Student::count();
        $employeeCount = Employee::count();
        $departmentCount = Department::count();
        $courseCount = Course::count();
        return view('dashboard', compact('teacherCount', 'studentCount', 'employeeCount', 'departmentCount', 'courseCount'));
    }
} 