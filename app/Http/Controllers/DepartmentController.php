<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\CrudService;

class DepartmentController extends Controller
{
    protected $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
        $this->service->setModel(Department::class);
    }

    public function index()
    {
        $departments = $this->service->getAll();
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $this->service->create($request->all());
        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        $department = $this->service->getById($id);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
} 