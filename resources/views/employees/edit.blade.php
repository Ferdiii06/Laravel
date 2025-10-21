<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pegawai</title>
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
        <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Edit Data Pegawai</h2>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table class="w-full form-table">
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Nama Lengkap</td>
                    <td class="py-2"><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Email</td>
                    <td class="py-2"><input type="email" name="email" value="{{ old('email', $employee->email) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Nomor Telepon</td>
                    <td class="py-2"><input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Tanggal Lahir</td>
                    <td class="py-2"><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Alamat</td>
                    <td class="py-2"><input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Tanggal Masuk</td>
                    <td class="py-2"><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </td>
                </tr>
                <tr class="mb-4">
                    <td class="py-2 text-sm text-gray-700">Status</td>
                    <td class="py-2">
                        <select name="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif
                            </option>
                            <option value="tidak aktif" {{ old('status', $employee->status) == 'tidak aktif' || old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>
                                Tidak Aktif</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="pt-6 text-right">
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
