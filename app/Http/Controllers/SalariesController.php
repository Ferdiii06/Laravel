<?php

namespace App\Http\Controllers;

use App\Models\Salaries;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalariesController extends Controller
{
    public function index()
    {
        $salaries = Salaries::with('employee')
            ->orderBy('bulan', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        // Mengambil daftar karyawan tanpa pengurutan untuk menghindari masalah kolom
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
    return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:20',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // Hitung total gaji
            $total_gaji = $validated['gaji_pokok'] + $validated['tunjangan'] - $validated['potongan'];

            // Buat record gaji baru
            Salaries::create([
                'karyawan_id' => $validated['karyawan_id'],
                'bulan' => $validated['bulan'],
                'gaji_pokok' => $validated['gaji_pokok'],
                'tunjangan' => $validated['tunjangan'],
                'potongan' => $validated['potongan'],
                'total_gaji' => $total_gaji
            ]);

            DB::commit();
            return redirect()->route('salaries.index')
                ->with('success', 'Data gaji berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data gaji')
                ->withInput();
        }
    }

    public function show($id)
    {
        $salary = Salaries::with('employee')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    public function edit($id)
    {
        $salary = Salaries::findOrFail($id);
    // Menggunakan nama_lengkap bukan nama
    $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
    return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:20',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $salary = Salaries::findOrFail($id);

            // Hitung total gaji
            $total_gaji = $validated['gaji_pokok'] + $validated['tunjangan'] - $validated['potongan'];

            $salary->update([
                'karyawan_id' => $validated['karyawan_id'],
                'bulan' => $validated['bulan'],
                'gaji_pokok' => $validated['gaji_pokok'],
                'tunjangan' => $validated['tunjangan'],
                'potongan' => $validated['potongan'],
                'total_gaji' => $total_gaji
            ]);

            DB::commit();
            return redirect()->route('salaries.index')
                ->with('success', 'Data gaji berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data gaji')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $salary = Salaries::findOrFail($id);
            $salary->delete();
            DB::commit();

            return redirect()->route('salaries.index')
                ->with('success', 'Data gaji berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menghapus data gaji');
        }
    }
}
