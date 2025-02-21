@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Penilaian</h1>
    <form action="{{ url('/penilaian/update', $penilaian->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id">ID</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ $penilaian->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_pendaftar">Nama Pendaftar</label>
            <input type="text" class="form-control" id="nama_pendaftar" name="nama_pendaftar" value="{{ $penilaian->nama_pendaftar }}" required>
        </div>
        <div class="form-group">
            <label for="tes_pemrograman_web">Tes Pemrograman Web</label>
            <input type="number" class="form-control" id="tes_pemrograman_web" name="tes_pemrograman_web" value="{{ $penilaian->tes_pemrograman_web }}" required>
        </div>
        <div class="form-group">
            <label for="tes_pemrograman_mobil">Tes Pemrograman Mobile</label>
            <input type="number" class="form-control" id="tes_pemrograman_mobil" name="tes_pemrograman_mobil" value="{{ $penilaian->tes_pemrograman_mobil }}" required>
        </div>
        <div class="form-group">
            <label for="tes_photoshop">Tes Photoshop</label>
            <input type="number" class="form-control" id="tes_photoshop" name="tes_photoshop" value="{{ $penilaian->tes_photoshop }}" required>
        </div>
        <div class="form-group">
            <label for="tes_microsoft_office">Tes Microsoft Office</label>
            <input type="number" class="form-control" id="tes_microsoft_office" name="tes_microsoft_office" value="{{ $penilaian->tes_microsoft_office }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>

    <a href="{{ url('/penilaian') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
