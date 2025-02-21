@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ranking MOORA</h1>

    <!-- Tambahkan tombol tambah data -->
    <a href="{{ url('/penilaian/tambah') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <!-- Tabel untuk menampilkan data -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pendaftar</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $item)
            <tr>
                <td>{{ $item['nama_pendaftar'] }}</td>
                <td>{{ $item['score'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
