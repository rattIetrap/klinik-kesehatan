@extends('layouts.app')

@section('content')
    <h1>Daftar Rekam Medis</h1>
    <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary">Tambah Rekam Medis Baru</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tanggal Periksa</th>
                <th>Diagnosis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekamMedis as $rm)
                <tr>
                    <td>{{ $rm->pasien->nama }}</td>
                    <td>{{ $rm->dokter->nama }}</td>
                    <td>{{ $rm->tanggal_periksa }}</td>
                    <td>{{ Str::limit($rm->diagnosis, 50) }}</td>
                    <td>
                        <a href="{{ route('rekam-medis.show', $rm->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('rekam-medis.edit', $rm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rekam-medis.destroy', $rm->id) }}" method="POST" style="display:inline">
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
