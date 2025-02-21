@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ranking MOORA</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pendaftar</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranking as $item)
                <tr>
                    <td>{{ $item['nama_pendaftar'] }}</td>
                    <td>{{ $item['F1 score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
