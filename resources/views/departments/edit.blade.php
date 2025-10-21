<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Department</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-table tr td:first-child {
            width: 150px; 
            padding-right: 1rem;
            font-weight: 500;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Edit Data Department</h2>

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="w-full form-table">
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">ID</td>
                    <td class="py-2"><input type="text" name="id" value="{{ old('id', $department->id) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed sm:text-sm" readonly></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Nama Department</td>
                    <td class="py-2"><input type="text" name="nama_department" value="{{ old('nama_department', $department->nama_department) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Description</td>
                    <td class="py-2"><textarea name="description" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $department->description) }}</textarea></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Jabatan</td>
                    <td class="py-2"><input type="text" name="jabatan" value="{{ old('jabatan', $department->jabatan) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                 <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Aksi (Placeholder)</td>
                    <td class="py-2"><input type="text" name="aksi" value="{{ old('aksi', $department->aksi) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr>
                    <td colspan="2" class="pt-6 text-right">
                        <a href="{{ route('departments.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Update
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
