@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gray-50 rounded-lg shadow-lg">
    <h1 class="text-3xl font-extrabold text-blue-600 mb-6">Tambah Data Penilaian</h1>

    <form action="{{ url('/penilaian/simpan') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="id" class="block text-sm font-semibold text-gray-800">ID</label>
            <input type="number" id="id" name="id" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="nama_pendaftar" class="block text-sm font-semibold text-gray-800">Nama Pendaftar</label>
            <input type="text" id="nama_pendaftar" name="nama_pendaftar" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="tes_pemrograman_web" class="block text-sm font-semibold text-gray-800">Tes Pemrograman Web</label>
            <input type="number" id="tes_pemrograman_web" name="tes_pemrograman_web" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="tes_pemrograman_mobil" class="block text-sm font-semibold text-gray-800">Tes Pemrograman Mobile</label>
            <input type="number" id="tes_pemrograman_mobil" name="tes_pemrograman_mobil" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="tes_photoshop" class="block text-sm font-semibold text-gray-800">Tes Photoshop</label>
            <input type="number" id="tes_photoshop" name="tes_photoshop" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="tes_microsoft_office" class="block text-sm font-semibold text-gray-800">Tes Microsoft Office</label>
            <input type="number" id="tes_microsoft_office" name="tes_microsoft_office" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label for="created_at" class="block text-sm font-semibold text-gray-800">Created At</label>
            <input type="datetime-local" id="created_at" name="created_at" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="updated_at" class="block text-sm font-semibold text-gray-800">Updated At</label>
            <input type="datetime-local" id="updated_at" name="updated_at" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:from-blue-600 hover:to-green-600">
            Simpan
        </button>
    </form>

    <h2 class="text-2xl font-bold text-gray-700 mt-10 mb-4">Data Penilaian</h2>
    <table class="w-full table-auto border-collapse border border-gray-300 shadow-lg">
        <thead class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nama Pendaftar</th>
                <th class="border border-gray-300 px-4 py-2">Tes Web</th>
                <th class="border border-gray-300 px-4 py-2">Tes Mobile</th>
                <th class="border border-gray-300 px-4 py-2">Tes Photoshop</th>
                <th class="border border-gray-300 px-4 py-2">Tes Office</th>
                <th class="border border-gray-300 px-4 py-2">Created At</th>
                <th class="border border-gray-300 px-4 py-2">Updated At</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-gray-50">
            @foreach($penilaian as $item)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2">{{ $item->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->nama_pendaftar }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->tes_pemrograman_web }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->tes_pemrograman_mobil }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->tes_photoshop }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->tes_microsoft_office }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->created_at }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->updated_at }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="{{ url('/penilaian/edit/'.$item->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded-md shadow hover:bg-yellow-500">Edit</a>
                    <form action="{{ url('/penilaian/hapus/'.$item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md shadow hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
