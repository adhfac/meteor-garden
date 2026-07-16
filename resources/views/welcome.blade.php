<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteor Garden | Kursus Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/meteor.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333333;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Libre Baskerville', Georgia, serif;
        }

        .hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                Meteor Garden
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">

                </ul>

                <div class="d-flex gap-2">

                    @guest

                        <a href="{{ route('login') }}" class="btn btn-outline-light">
                            Login
                        </a>

                        <a href="{{ route('register') }}" class="btn btn-warning">
                            Daftar
                        </a>

                    @endguest

                    @auth

                        <a href="/pengumuman" class="btn btn-light">
                            Dashboard
                        </a>

                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger">
                                Logout
                            </button>
                        </form>

                    @endauth

                </div>

            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h1 class="fw-bold">
                        Selamat Datang di Meteor Garden
                    </h1>

                    <p class="text-muted">
                        Tempat kursus online yang membantu Anda mempelajari
                        teknologi, desain, dan berbagai keterampilan baru
                        dengan mentor yang berpengalaman.
                    </p>

                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Daftar Sekarang
                        </a>
                    @endguest

                    @auth
                        <a href="/dashboard" class="btn btn-primary">
                            Masuk Dashboard
                        </a>
                    @endauth

                </div>

                <div class="col-md-6 text-center">

                    <img src="https://picsum.photos/500/350" class="img-fluid rounded shadow" alt="Belajar Online">

                </div>

            </div>

        </div>

    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-5">

        <div class="container">

            <h2 class="text-center mb-4">
                Tentang Kami
            </h2>

            <p class="text-center text-muted">
                Meteor Garden merupakan platform kursus online yang menyediakan
                berbagai materi pembelajaran mulai dari pemrograman,
                desain grafis, pengembangan web, hingga kecerdasan buatan.
            </p>

        </div>

    </section>

    <!-- CTA -->
    <section class="py-5">

        <div class="container text-center">

            <h3>
                Siap Memulai Belajar?
            </h3>

            <p class="text-muted">
                Bergabunglah bersama Meteor Garden sekarang juga.
            </p>

            @guest
                <a href="{{ route('register') }}" class="btn btn-success">
                    Daftar Gratis
                </a>
            @endguest

            <a href="/cek-status" class="btn btn-outline-primary">
                Cek Status Akun
            </a>

        </div>

    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">

        <div class="container">

            © 2026 Meteor Garden | Sistem Pendaftaran Kursus Online

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
