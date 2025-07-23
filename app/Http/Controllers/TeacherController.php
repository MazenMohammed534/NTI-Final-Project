<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\CrudService;

class TeacherController extends Controller
{
    protected $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
        $this->service->setModel(Teacher::class);
    }

    public function index()
    {
        $teachers = $this->service->getAll(['department', 'courses']);
        return view('teacher.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('teacher.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $this->service->create($request->all());
        return redirect()->route('teacher.index')->with('success', 'Teacher created successfully.');
    }

    public function edit($id)
    {
        $teacher = $this->service->getById($id);
        $departments = Department::all();
        return view('teacher.edit', compact('teacher', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
} 