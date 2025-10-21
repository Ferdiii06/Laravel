@extends('master')

@section('title', 'Detail Absensi')

@section('content')

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-xl">
            <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Detail Absensi</h1>

            <table class="w-full divide-y divide-gray-200 border border-gray-200 rounded-lg overflow-hidden">
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50 w-1/3">ID Absensi</th>
                        <td class="px-4 py-3 text-sm text-gray-900 w-2/3">{{ $attendance->id }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">ID Karyawan</th>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $attendance->karyawan_id }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Tanggal</th>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Waktu Masuk</th>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $attendance->waktu_masuk ?? '-' }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Waktu Keluar</th>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $attendance->waktu_keluar ?? 'Belum Keluar' }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Status</th>
                        <td class="px-4 py-3 text-sm text-gray-900">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($attendance->status_absensi == 'Hadir') bg-blue-100 text-blue-800
                                @elseif($attendance->status_absensi == 'Terlambat') bg-yellow-100 text-yellow-800
                                @elseif($attendance->status_absensi == 'Izin') bg-indigo-100 text-indigo-800
                                @elseif($attendance->status_absensi == 'Cuti') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $attendance->status_absensi }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 text-right">
                <a href="{{ route('attendances.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm shadow-md">
                    Kembali ke Daftar Absensi
                </a>
            </div>
        </div>
    </div>

@endsection
