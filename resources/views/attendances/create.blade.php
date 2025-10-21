@extends('master')
@section('title', 'Tambah Absensi Baru')
@section('content')

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .form-table tr td:first-child {
                width: 150px;
                padding-right: 1rem;
                font-weight: 500;
            }
        </style>
    </head>

    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
            <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Tambah Data Absensi Baru</h1>
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf
                <table class="w-full form-table">
                    <tr>
                        <td class="py-2"><label for="karyawan_id" class="block text-sm font-medium text-gray-700"> Karyawan ID:</label></td>
                        <td class="py-2">
                            {{-- Saya mempertahankan tipe number karena ini adalah ID --}}
                            <input type="number" id="karyawan_id" name="karyawan_id" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>

                    <tr>
                        <td class="py-2"><label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal:</label></td>
                        <td class="py-2"><input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                    </tr>

                    <tr>
                        <td class="py-2"><label for="waktu_masuk" class="block text-sm font-medium text-gray-700">Waktu Masuk:</label></td>
                        <td class="py-2"><input type="time" id="waktu_masuk" name="waktu_masuk"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                    </tr>

                    <tr>
                        <td class="py-2"><label for="waktu_keluar" class="block text-sm font-medium text-gray-700">Waktu Keluar:</label></td>
                        <td class="py-2"><input type="time" id="waktu_keluar" name="waktu_keluar"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                    </tr>

                    <tr>
                        <td class="py-2"><label for="status_absensi" class="block text-sm font-medium text-gray-700">Status Absensi:</label></td>
                        <td class="py-2">
                            <select id="status_absensi" name="status_absensi" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="Hadir">Hadir</option>
                                <option value="Terlambat">Terlambat</option>
                                <option value="Izin">Izin</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Alpha">Alpha</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <div class="mt-8 pt-4 border-t text-right">
                    <a href="{{ route('attendances.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Simpan Absensi
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
