<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Attendance harus meng-extends Model, BUKAN Seeder
class Attendance extends Model
{
    use HasFactory;

    // Larik ini diperlukan agar metode ::all() berfungsi
    protected $table = 'attendance';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];

    
}
