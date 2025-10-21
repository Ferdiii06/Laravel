<!DOCTYPE html>
<html>

<head>
    <title>Form Input Department</title>
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
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Form Department</h1>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <table class="w-full form-table">
                <tr class="mb-4">
                    <td class="py-2"><label for="id" class="block text-sm font-medium text-gray-700">ID:</label></td>
                    <td class="py-2"><input type="text" id="id" name="id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>

                <tr class="mb-4">
                    <td class="py-2"><label for="nama_department" class="block text-sm font-medium text-gray-700">Nama Department:</label></td>
                    <td class="py-2"><input type="text" id="nama_department" name="nama_department" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>

                <tr class="mb-4">
                    <td class="py-2"><label for="description" class="block text-sm font-medium text-gray-700">Description:</label></td>
                    <td class="py-2"><textarea id="description" name="description" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea></td>
                </tr>

                <tr class="mb-4">
                    <td class="py-2"><label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan:</label></td>
                    <td class="py-2"><input type="text" id="jabatan" name="jabatan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>

                <tr class="mb-4">
                    <td class="py-2"><label for="aksi" class="block text-sm font-medium text-gray-700">Aksi (Placeholder):</label></td>
                    <td class="py-2"><input type="text" id="aksi" name="aksi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>

                <tr>
                    <td colspan="2" class="pt-6 text-right">
                         <a href="{{ route('departments.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
