@extends('master')
@section('title', 'Daftar Gaji Karyawan')
@section('content')

<head>
    <meta charset="UTF-8">
    <title>Daftar Salaries</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto mt-10 p-6 bg-white shadow-xl rounded-lg max-w-7xl">
    <div class="flex justify-between items-center mb-6 border-b pb-3">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Gaji Karyawan</h1>
        <a href="{{ route('salaries.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out shadow-md">
            + Tambah Gaji
        </a>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-12">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Karyawan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji Pokok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tunjangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Potongan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-extrabold">Total Gaji</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($salaries  as $salarie)
                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{ $salarie->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $salarie->karyawan_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp{{ number_format($salarie->gaji_pokok, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp{{ number_format($salarie->tunjangan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp{{ number_format($salarie->potongan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">Rp{{ number_format($salarie->total_gaji, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <div class="flex space-x-2 justify-center">
                                <a href="{{ route('salaries.show', $salarie->id) }}" class="text-blue-600 hover:text-blue-800 border border-blue-600 hover:border-blue-800 px-3 py-1 rounded transition duration-150 ease-in-out text-xs font-semibold">Detail</a>
                                <a href="{{ route('salaries.edit', $salarie->id) }}" class="text-indigo-600 hover:text-indigo-800 border border-indigo-600 hover:border-indigo-800 px-3 py-1 rounded transition duration-150 ease-in-out text-xs font-semibold">Edit</a>
                                <form action="{{ route('salaries.destroy', $salarie->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-800 border border-red-600 hover:border-red-800 px-3 py-1 rounded transition duration-150 ease-in-out text-xs font-semibold">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
