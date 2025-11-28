@extends('master')
@section('title', 'Edit Gaji Karyawan')
@section('content')

<div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Edit Data Gaji</h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="w-full">
                <tr>
                    <td class="py-2 pr-4">
                        <label class="block text-sm font-medium text-gray-700">ID Gaji:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" value="{{ $salary->id }}" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed sm:text-sm">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 pr-4">
                        <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Nama Karyawan:</label>
                    </td>
                    <td class="py-2">
                        <select name="karyawan_id" id="karyawan_id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 pr-4">
                        <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan Gaji:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" name="bulan" value="{{ old('bulan', $salary->bulan) }}" required placeholder="Contoh: Desember 2024" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 pr-4">
                        <label for="gaji_pokok" class="block text-sm font-medium text-gray-700">Gaji Pokok:</label>
                    </td>
                    <td class="py-2">
                        <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required min="0" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 pr-4">
                        <label for="tunjangan" class="block text-sm font-medium text-gray-700">Tunjangan:</label>
                    </td>
                    <td class="py-2">
                        <input type="number" name="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}" required min="0" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 pr-4">
                        <label for="potongan" class="block text-sm font-medium text-gray-700">Potongan:</label>
                    </td>
                    <td class="py-2">
                        <input type="number" name="potongan" value="{{ old('potongan', $salary->potongan) }}" required min="0" step="0.01" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr>
                    <td class="py-2 pr-4">
                        <label class="block text-sm font-medium text-gray-700">Total Gaji:</label>
                    </td>
                    <td class="py-2">
                        <input type="text" value="Rp{{ number_format($salary->total_gaji, 0, ',', '.') }}" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed sm:text-sm">
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
