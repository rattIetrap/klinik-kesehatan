@extends('layouts.app')

@section('content')
    <h1>Daftar Janji Temu</h1>
    <a href="{{ route('janji-temus.create') }}" class="btn btn-primary">Buat Janji Temu Baru</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Waktu Janji</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($janjiTemus as $janjiTemu)
                <tr>
                    <td>{{ $janjiTemu->pasien->nama }}</td>
                    <td>{{ $janjiTemu->dokter->nama }}</td>
                    <td>{{ $janjiTemu->waktu_janji }}</td>
                    <td>{{ $janjiTemu->status }}</td>
                    <td>
                        <a href="{{ route('janji-temus.show', $janjiTemu->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('janji-temus.edit', $janjiTemu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('janji-temus.destroy', $janjiTemu->id) }}" method="POST"
                            style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
