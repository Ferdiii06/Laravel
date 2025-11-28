<?php


namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
{
    $departments = Department::all();
    $positions = Position::all();
    return view('employees.create', compact('departments', 'positions'));
}

   public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            // Sesuaikan 'status' ke 'nonaktif' dan gunakan 'departemen_id' / 'jabatan_id'
            'status'         => 'required|in:aktif,nonaktif', 
            'departemen_id'  => 'required|exists:departments,id', 
            'jabatan_id'     => 'required|exists:positions,id',
        ]);

        Employee::create($data); // Data yang divalidasi sekarang sesuai dengan $fillable di Model

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil disimpan.');
    }

    public function show($id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:employees,email,' . $id,
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            // Sesuaikan 'status' ke 'nonaktif' dan gunakan 'departemen_id' / 'jabatan_id'
            'status'         => 'required|in:aktif,nonaktif', 
            'departemen_id'  => 'nullable|exists:departments,id', 
            'jabatan_id'     => 'nullable|exists:positions,id',
        ]);

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
