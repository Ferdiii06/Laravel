@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <div class="container mx-auto mt-10 p-6 bg-white shadow-xl rounded-lg max-w-7xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Daftar Absensi Karyawan</h1>

        <div class="mb-6">
            <a href="{{ route('attendances.create') }}" class="inline-block  bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out shadow-md">
                + Tambah Absensi
            </a>
        </div>

        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-12">No</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ID Karyawan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Masuk</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($attendances as $attendance)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">{{ $attendance->karyawan_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">{{ $attendance->waktu_masuk ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-center">{{ $attendance->waktu_keluar ?? 'Belum Keluar' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
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
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex space-x-2 justify-center">
                                    <a href="{{ route('attendances.show', $attendance->id) }}" class="text-blue-600 hover:text-blue-800 border border-blue-600 hover:border-blue-800 px-3 py-1 rounded transition duration-150 ease-in-out text-xs font-semibold">Detail</a>
                                    <a href="{{ route('attendances.edit', $attendance->id) }}" class="text-indigo-600 hover:text-indigo-800 border border-indigo-600 hover:border-indigo-800 px-3 py-1 rounded transition duration-150 ease-in-out text-xs font-semibold">Edit</a>
                                    <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-800 border border-red-600 hover:border-red-800 px-3 py-1 rounded transition duration-150 ease-in-out text-xs font-semibold">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Data absensi masih kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
