@extends('layouts.app')

@section('content')
    <h1>Daftar Dokter</h1>
    <a href="{{ route('dokters.create') }}" class="btn btn-primary">Tambah Dokter Baru</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>No. Izin Praktek</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokters as $dokter)
                <tr>
                    <td>{{ $dokter->nama }}</td>
                    <td>{{ $dokter->spesialisasi }}</td>
                    <td>{{ $dokter->no_izin_praktek }}</td>
                    <td>
                        <a href="{{ route('dokters.show', $dokter->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('dokters.edit', $dokter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dokters.destroy', $dokter->id) }}" method="POST" style="display:inline">
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
