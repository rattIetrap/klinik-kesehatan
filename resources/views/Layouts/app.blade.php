<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Kesehatan Pandawara')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Klinik Kesehatan Pandawara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pasiens.index') }}">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dokters.index') }}">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('janji-temus.index') }}">Janji Temu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rekam-medis.index') }}">Rekam Medis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="mt-5 py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2024 Klinik Kesehatan Pandawara</span>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
