<!DOCTYPE html>
<html>

<head>
    <title>Form Input Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        .form-table tr td:first-child {
            width: 150px; 
            padding-right: 1rem;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Form Pegawai</h1>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <table class="w-full form-table">
                <tr class="mb-4">
                    <td class="py-2"><label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap:</label></td>
                    <td class="py-2"><input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2"><label for="email" class="block text-sm font-medium text-gray-700">Email:</label></td>
                    <td class="py-2"><input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2"><label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label></td>
                    <td class="py-2"><input type="text" id="nomor_telepon" name="nomor_telepon" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2"><label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir:</label></td>
                    <td class="py-2"><input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2"><label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label></td>
                    <td class="py-2"><textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2"><label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk:</label></td>
                    <td class="py-2"><input type="date" id="tanggal_masuk" name="tanggal_masuk" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2"><label for="status" class="block text-sm font-medium text-gray-700">Status:</label></td>
                    <td class="py-2">
                        <select id="status" name="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="pt-6 text-right">
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
