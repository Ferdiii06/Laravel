@extends('master')
@section('title','Laporan Pegawai')
@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded shadow">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-semibold">Laporan Pegawai</h1>
    <div class="flex gap-2">
      <a href="{{ route('reports.export', request()->query()) }}" class="bg-slate-700 text-white px-3 py-1 rounded">Export CSV</a>
      <a href="{{ route('employees.create') }}" class="bg-green-600 text-white px-3 py-1 rounded">Tambah Pegawai</a>
    </div>
  </div>

  <form class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-3" method="GET" action="{{ route('reports.index') }}">
    <input name="q" value="{{ $q ?? '' }}" placeholder="Cari nama / email / telepon" class="border p-2 rounded" />
    <select name="department" class="border p-2 rounded">
      <option value="">Semua Departemen</option>
      @foreach($departments as $key => $label)
        <option value="{{ $key }}" {{ (string)($department ?? '') === (string)$key ? 'selected':'' }}>{{ $label }}</option>
      @endforeach
    </select>
    <select name="position" class="border p-2 rounded">
      <option value="">Semua Jabatan</option>
      @foreach($positions as $key => $label)
        <option value="{{ $key }}" {{ (string)($position ?? '') === (string)$key ? 'selected':'' }}>{{ $label }}</option>
      @endforeach
    </select>
    <select name="status" class="border p-2 rounded">
      <option value="">Semua Status</option>
      <option value="aktif" {{ (string)($status ?? '')==='aktif' ? 'selected':'' }}>Aktif</option>
      <option value="non-aktif" {{ (string)($status ?? '')==='non-aktif' ? 'selected':'' }}>Non-aktif</option>
    </select>

    <div class="md:col-span-4 flex gap-2 justify-end">
      <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Filter</button>
      <a href="{{ route('reports.index') }}" class="border px-4 py-2 rounded">Reset</a>
    </div>
  </form>

  <div class="overflow-x-auto">
    <table class="w-full table-auto border-collapse">
      <thead>
        <tr class="text-left bg-gray-100">
          <th class="p-2 border">#</th>
          <th class="p-2 border">Nama</th>
          <th class="p-2 border">Email</th>
          <th class="p-2 border">Telepon</th>
          <th class="p-2 border">Departemen</th>
          <th class="p-2 border">Jabatan</th>
          <th class="p-2 border">Status</th>
          <th class="p-2 border">Tanggal Masuk</th>
          <th class="p-2 border">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($employees as $emp)
        <tr class="odd:bg-white even:bg-gray-50">
          <td class="p-2 border">{{ $emp->id }}</td>
          <td class="p-2 border">{{ $emp->nama_lengkap }}</td>
          <td class="p-2 border">{{ $emp->email }}</td>
          <td class="p-2 border">{{ $emp->nomor_telepon }}</td>
          <td class="p-2 border">{{ $emp->departemen ?? optional($emp->department)->nama_departments ?? '-' }}</td>
          <td class="p-2 border">{{ $emp->jabatan ?? optional($emp->position)->nama_jabatan ?? '-' }}</td>
          <td class="p-2 border">{{ $emp->status }}</td>
          <td class="p-2 border">{{ $emp->tanggal_masuk ? \Carbon\Carbon::parse($emp->tanggal_masuk)->format('d M Y') : '-' }}</td>
          <td class="p-2 border">
            <a href="{{ route('employees.edit', $emp->id) }}" class="text-indigo-600 mr-2">Edit</a>
            <form class="inline" action="{{ route('employees.destroy', $emp->id) }}" method="POST">@csrf @method('DELETE')
              <button onclick="return confirm('Hapus pegawai?')" class="text-red-600">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td class="p-4" colspan="9">Tidak ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    @if(method_exists($employees,'links')){{ $employees->links() }}@endif
  </div>
</div>
@endsection