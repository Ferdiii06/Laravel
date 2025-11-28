@extends('master')
@section('title', 'Detail Settings')
@section('content')

<div class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-2xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-3">Detail Site Settings</h1>

        <table class="w-full divide-y divide-gray-200 border border-gray-200 rounded-lg overflow-hidden">
            <tbody>
                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50 w-1/3">ID</th>
                    <td class="px-4 py-3 text-sm text-gray-900 w-2/3">{{ $setting->id }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Site Name</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->site_name ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Site Description</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->site_description ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Company Name</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->company_name ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Email</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->email ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Phone</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->phone ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Address</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->address ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Timezone</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->timezone ?? '-' }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Logo</th>
                    <td class="px-4 py-3 text-sm text-gray-900">
                        @if($setting->logo)
                            <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="h-20 w-auto object-contain border border-gray-300 rounded p-2">
                        @else
                            <span class="text-gray-400">Tidak ada logo</span>
                        @endif
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Created At</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->created_at->format('d F Y H:i') }}</td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">Updated At</th>
                    <td class="px-4 py-3 text-sm text-gray-900">{{ $setting->updated_at->format('d F Y H:i') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('settings.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm shadow-md">
                Kembali ke Daftar
            </a>
            <a href="{{ route('settings.edit', $setting->id) }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration
