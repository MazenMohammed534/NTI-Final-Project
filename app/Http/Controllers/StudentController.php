<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Services\CrudService;

class StudentController extends Controller
{
    protected $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
        $this->service->setModel(Student::class);
    }

    public function index()
    {
        $students = $this->service->getAll(['department', 'courses']);
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        $courses = Course::all();
        return view('student.create', compact('departments', 'courses'));
    }

    public function store(Request $request)
    {
        $student = $this->service->create($request->all());
        if ($request->has('courses')) {
            $student->courses()->sync($request->input('courses'));
        }
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = $this->service->getById($id);
        $departments = Department::all();
        $courses = Course::all();
        return view('student.edit', compact('student', 'departments', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $student = $this->service->update($id, $request->all());
        if ($request->has('courses')) {
            $student->courses()->sync($request->input('courses'));
        }
        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
} 