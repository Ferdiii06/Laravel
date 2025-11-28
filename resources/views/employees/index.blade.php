@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
<head>
    <meta charset="UTF-8">
    <title>Daftar Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


    <div class="container mx-auto mt-10 p-6 bg-white shadow-xl rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Daftar Pegawai</h1>

        <div class="mb-4 text-right">
            <a href="{{ route('employees.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                Tambah Pegawai
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($employees as $employee)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $employee->nama_lengkap }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->nomor_telepon }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->tanggal_lahir }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $employee->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->tanggal_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $employee->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $employee->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex space-x-2 justify-center items-center">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:text-blue-900 border border-blue-600 hover:border-blue-900 px-2 py-1 rounded transition duration-150 ease-in-out text-xs">Detail</a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-indigo-600 hover:text-indigo-900 border border-indigo-600 hover:border-indigo-900 px-2 py-1 rounded transition duration-150 ease-in-out text-xs">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-900 border border-red-600 hover:border-red-900 px-2 py-1 rounded transition duration-150 ease-in-out text-xs">
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
