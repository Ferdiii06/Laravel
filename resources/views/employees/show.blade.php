<!DOCTYPE html>
<html>

<head>
    <title>Detail Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Detail Pegawai</h1>

        <table class="w-full divide-y divide-gray-200">
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 w-1/3">Nama Lengkap</th>
                <td class="px-4 py-3 text-sm text-gray-900 w-2/3">{{ $employee->nama_lengkap }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->email }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Nomor Telepon</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->nomor_telepon }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Tanggal Lahir</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->tanggal_lahir }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Alamat</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->alamat }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Tanggal Masuk</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->tanggal_masuk }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Departemen</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->department?->nama ?? '-' }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Jabatan</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $employee->position?->nama ?? '-' }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                <td class="px-4 py-3 text-sm text-gray-900">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $employee->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $employee->status }}
                    </span>
                </td>
            </tr>
        </table>
        <div class="mt-6 text-right">
             <a href="{{ route('employees.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm">Kembali ke Daftar</a>
        </div>
    </div>
</body>

</html>