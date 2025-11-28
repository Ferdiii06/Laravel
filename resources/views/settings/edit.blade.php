@extends('master')
@section('title', 'Edit Settings')
@section('content')

<div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-2xl">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Edit Site Settings</h2>

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

        <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="site_name" class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Masukkan nama situs">
            </div>

            <div class="mb-4">
                <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">Site Description</label>
                <textarea id="site_description" name="site_description" rows="3"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Deskripsi situs">{{ old('site_description', $setting->site_description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $setting->company_name) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Nama perusahaan">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $setting->email) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="email@example.com">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="08xxxxxxxxxx">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                <textarea id="address" name="address" rows="3"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Alamat lengkap">{{ old('address', $setting->address) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="timezone" class="block text-sm font-medium text-gray-700 mb-2">Timezone</label>
                <input type="text" id="timezone" name="timezone" value="{{ old('timezone', $setting->timezone) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Asia/Jakarta">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Logo Saat Ini</label>
                @if($setting->logo)
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Current Logo" class="h-20 w-auto object-contain mb-3 border border-gray-300 rounded p-2">
                @else
                    <p class="text-sm text-gray-500 mb-3">Belum ada logo</p>
                @endif

                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Upload Logo Baru</label>
                <input type="file" id="logo" name="logo" accept="image/jpeg,image/png,image/jpg,image/svg+xml,image/webp"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, SVG, WEBP (Max: 2MB)</p>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="{{ route('settings.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
