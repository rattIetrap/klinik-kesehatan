<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Selamat Datang di Klinik Kesehatan Pandawara</h1>
            <p class="lead">Melayani dengan sepenuh hati untuk kesehatan Anda</p>
            <hr class="my-4">
            <p>Klinik Kesehatan Pandawara menyediakan layanan kesehatan berkualitas sejak tahun 2010.</p>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftaran Online</h5>
                        <p class="card-text">Daftar sebagai pasien baru atau atur janji temu dengan dokter kami.</p>
                        <a href="{{ route('pasiens.create') }}" class="btn btn-primary">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Layanan Kami</h5>
                        <p class="card-text">Temukan berbagai layanan kesehatan yang kami sediakan.</p>
                        <a href="#" class="btn btn-primary">Lihat Layanan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Dokter</h5>
                        <p class="card-text">Lihat jadwal praktik dokter-dokter kami.</p>
                        <a href="{{ route('dokters.index') }}" class="btn btn-primary">Cek Jadwal</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2>Tentang Kami</h2>
            <p>Klinik Kesehatan Pandawara didirikan pada tahun 2010 oleh Dr. Budi Santoso dengan tujuan menyediakan layanan
                kesehatan yang terjangkau dan berkualitas untuk masyarakat umum. Kami berkomitmen untuk terus meningkatkan
                kualitas pelayanan dan fasilitas demi kesehatan dan kepuasan pasien kami.</p>
        </div>

        <div class="mt-5">
            <h2>Hubungi Kami</h2>
            <p>Jl. Kesehatan No. 123, Kota Sehat</p>
            <p>Telepon: (021) 1234-5678</p>
            <p>Email: info@klinikpandawara.com</p>
        </div>
    </div>
@endsection
