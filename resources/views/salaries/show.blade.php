@extends('master')

@section('title', 'Detail Gaji Karyawan')

@section('content')

    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-xl">
            <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Detail Data Gaji</h1>

            {{-- Menggunakan variabel $salaries sesuai controller --}}
            <table class="w-full divide-y divide-gray-200 border border-gray-200 rounded-lg overflow-hidden">
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50 w-1/3">ID Gaji</th>
                        <td class="px-4 py-3 text-sm text-gray-900 w-2/3">{{ $salaries->id }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">ID Karyawan</th>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $salaries->karyawan_id }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Bulan Gaji</th>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $salaries->bulan ?? '-' }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Gaji Pokok</th>
                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">Rp{{ number_format($salaries->gaji_pokok, 0, ',', '.') }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Tunjangan</th>
                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">Rp{{ number_format($salaries->tunjangan, 0, ',', '.') }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Potongan</th>
                        <td class="px-4 py-3 text-sm text-gray-900 font-medium">Rp{{ number_format($salaries->potongan, 0, ',', '.') }}</td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <th class="px-4 py-3 text-left text-lg font-bold text-gray-700 bg-gray-100">Total Gaji Diterima</th>
                        <td class="px-4 py-3 text-lg font-bold text-green-600 bg-gray-100">Rp{{ number_format($salaries->total_gaji, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 text-right">
                <a href="{{ route('salaries.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm shadow-md">
                    Kembali ke Daftar Gaji
                </a>
            </div>
        </div>
    </div>

@endsection
