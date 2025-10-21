@extends('master')
@section('title', 'Edit Gaji Karyawan')
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
            <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Edit Data Gaji</h2>

            <form action="{{ route('salaries.update', $salaries->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="w-full form-table">
                    <tr>
                        <td class="py-2"><label for="id" class="block text-sm font-medium text-gray-700">ID Gaji:</label></td>
                        <td class="py-2">
                            <input type="number" name="id" value="{{ old('id', $salaries->id) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed sm:text-sm" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="karyawan_id" class="block text-sm font-medium text-gray-700">ID Karyawan:</label></td>
                        <td class="py-2">
                            <input type="number" name="karyawan_id" value="{{ old('karyawan_id', $salaries->karyawan_id) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="bulan" class="block text-sm font-medium text-gray-700">Bulan Gaji:</label></td>
                        <td class="py-2">
                            <input type="text" name="bulan" value="{{ old('bulan', $salaries->bulan) }}" required placeholder="Contoh: Oktober 2025"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="gaji_pokok" class="block text-sm font-medium text-gray-700">Gaji Pokok:</label></td>
                        <td class="py-2">
                            <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="tunjangan" class="block text-sm font-medium text-gray-700">Tunjangan:</label></td>
                        <td class="py-2">
                            <input type="number" name="tunjangan" value="{{ old('tunjangan', $salaries->tunjangan) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="potongan" class="block text-sm font-medium text-gray-700">Potongan:</label></td>
                        <td class="py-2">
                            <input type="number" name="potongan" value="{{ old('potongan', $salaries->potongan) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="total_gaji" class="block text-sm font-medium text-gray-700">Total Gaji:</label></td>
                        <td class="py-2">
                            <input type="number" name="total_gaji" value="{{ old('total_gaji', $salaries->total_gaji) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </td>
                    </tr>
                </table>

                <div class="mt-8 pt-4 border-t text-right">
                    <a href="{{ route('salaries.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
