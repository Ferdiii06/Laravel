<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Menampilkan daftar semua data absensi.
     */
    public function index()
    {
        // Kode ini akan berfungsi setelah Attendance.php diubah menjadi Model
        $attendances = Attendance::all();

        // Mengirim data 'attendances' ke view 'attendance.index'
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendances.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'karyawan_id' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|string|max:50',
        ]);

        Attendance::create($validatedData);

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.edit', compact('attendances'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|string|max:50',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($validatedData);

        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();
        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil dihapus.');
    }

    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.show', compact('attendances'));
    }


}
