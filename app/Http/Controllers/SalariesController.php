<?php

namespace App\Http\Controllers;

use App\Models\Salaries;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    public function index()
    {
        $salaries = Salaries::with(['employee', 'salary_type'])->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        return view('salaries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:salaries,id',
            'karyawan_id' => 'required|integer|exists:employees,id',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);
        Salaries::create($request->all());
        return redirect()->route('salaries.index');
    }

    public function show(string $id)
    {
        $salaries = Salaries::findOrFail($id);
        return view('salaries.show', compact('salaries'));
    }

    public function edit(string $id)
    {
        $salaries = Salaries::find($id);
        return view('salaries.edit', compact('salaries'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required|integer|unique:salaries,id',
            'karyawan_id' => 'required|integer|exists:employees,id',
            'bulan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'total_gaji' => 'required|numeric',
        ]);
        $salaries = Salaries::findOrFail($id);
        $salaries->update($request->all());
        return redirect()->route('salaries.index');
    }

    public function destroy(string $id)
    {
        $salaries = Salaries::findOrFail($id);
        $salaries->delete();
        return redirect()->route('salaries.index');
    }

}
