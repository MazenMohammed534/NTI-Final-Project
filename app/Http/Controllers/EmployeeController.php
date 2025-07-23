<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Services\CrudService;

class EmployeeController extends Controller
{
    protected $service;

    public function __construct(CrudService $service)
    {
        $this->service = $service;
        $this->service->setModel(Employee::class);
    }

    public function index()
    {
        $employees = $this->service->getAll();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $this->service->create($request->all());
        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = $this->service->getById($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $this->service->update($id, $request->all());
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
} 