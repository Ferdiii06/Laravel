<!DOCTYPE html>
<html>

<head>
    <title>Form Input Salaries</title>
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
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Form Input Data Gaji</h1>

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <table class="w-full form-table">
                <tr>
                    <td class="py-2"><label for="id" class="block text-sm font-medium text-gray-700">ID (Wajib Diisi):</label></td>
                    <td class="py-2"><input type="number" id="id" name="id" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr>
                    <td class="py-2"><label for="karyawan_id" class="block text-sm font-medium text-gray-700">ID Karyawan:</label></td>
                    <td class="py-2">
                        <select name="karyawan_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2"><label for="bulan" class="block text-sm font-medium text-gray-700">Bulan Gaji:</label></td>
                    <td class="py-2"><input type="text" id="bulan" name="bulan" placeholder="Contoh: Oktober 2025" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr>
                    <td class="py-2"><label for="gaji_pokok" class="block text-sm font-medium text-gray-700">Gaji Pokok:</label></td>
                    <td class="py-2"><input type="number" id="gaji_pokok" name="gaji_pokok" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr>
                    <td class="py-2"><label for="tunjangan" class="block text-sm font-medium text-gray-700">Tunjangan:</label></td>
                    <td class="py-2"><input type="number" id="tunjangan" name="tunjangan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr>
                    <td class="py-2"><label for="potongan" class="block text-sm font-medium text-gray-700">Potongan:</label></td>
                    <td class="py-2"><input type="number" id="potongan" name="potongan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                 <tr>
                    <td class="py-2"><label for="total_gaji" class="block text-sm font-medium text-gray-700">Total Gaji:</label></td>
                    <td class="py-2"><input type="number" id="total_gaji" name="total_gaji" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr>
                    <td colspan="2" class="pt-6 text-right">
                         <a href="{{ route('salaries.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Simpan Data
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
