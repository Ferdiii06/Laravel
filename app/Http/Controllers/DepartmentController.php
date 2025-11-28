<?php

namespace App\Http\Controllers;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:departments,id',
            'nama_department' => 'required|string|max:255',
            'description' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'aksi' => 'nullable|string',
        ]);
        Department::create($request->all());
        return redirect()->route('departments.index');
    }

    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::find($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return redirect()->route('departments.index');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index');
    }
}

