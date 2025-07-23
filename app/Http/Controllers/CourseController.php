<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\CrudService;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
        $this->service->setModel(Course::class);
    }

    public function index()
    {
        $courses = $this->service->getAll(['department', 'teacher', 'students']);
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $departments = Department::all();
        $teachers = Teacher::all();
        return view('course.create', compact('departments', 'teachers'));
    }

    public function store(Request $request)
    {
        $this->service->create($request->all());
        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = $this->service->getById($id);
        $departments = Department::all();
        $teachers = Teacher::all();
        return view('course.edit', compact('course', 'departments', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }
} 