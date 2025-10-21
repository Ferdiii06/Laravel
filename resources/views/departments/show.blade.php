<!DOCTYPE html>
<html>

<head>
    <title>Detail Department</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Detail Department</h1>

        <table class="w-full divide-y divide-gray-200 border border-gray-200 rounded-lg overflow-hidden">
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50 w-1/3">ID</th>
                <td class="px-4 py-3 text-sm text-gray-900 w-2/3">{{ $department->id }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Nama Department</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $department->nama_department }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Description</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $department->description }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Jabatan</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $department->jabatan }}</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Aksi (Placeholder)</th>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $department->aksi }}</td>
            </tr>
        </table>

        <div class="mt-6 text-right">
             <a href="{{ route('departments.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm shadow-md">Kembali ke Daftar</a>
        </div>
    </div>
</body>

</html>
