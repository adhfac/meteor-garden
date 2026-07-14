<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteor Garden | Kursus Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            min-height: 90vh;
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            color: white;
            display: flex;
            align-items: center;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: #0d6efd;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            border-radius: 50%;
            margin: auto;
        }

        .course-card {
            transition: .3s;
        }

        .course-card:hover {
            transform: translateY(-8px);
        }

        footer {
            background: #212529;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                🌠 Meteor Garden
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a href="#tentang" class="nav-link">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a href="#kelas" class="nav-link">Kelas</a>
                    </li>

                    <li class="nav-item">
                        <a href="#keunggulan" class="nav-link">Keunggulan</a>
                    </li>

                    @guest
                        <li class="nav-item ms-2">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                                Login
                            </a>
                        </li>

                        <li class="nav-item ms-2">
                            <a href="{{ route('register') }}" class="btn btn-warning btn-sm">
                                Daftar
                            </a>
                        </li>
                    @endguest
                    
                    @auth
                        <li class="nav-item ms-2">
                            <a href="/dashboard" class="btn btn-outline-info btn-sm">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item ms-2">
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth

                </ul>

            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1 class="display-4 fw-bold">
                        Belajar Lebih Mudah Bersama
                        <span class="text-warning">Meteor Garden</span>
                    </h1>

                    <p class="lead mt-3">
                        Tingkatkan kemampuanmu melalui berbagai kursus online
                        dengan materi berkualitas, mentor profesional,
                        dan sertifikat penyelesaian.
                    </p>

                    <a href="/register" class="btn btn-warning btn-lg mt-3">
                        Daftar Sekarang
                    </a>

                </div>

                <div class="col-lg-6 text-center">

                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=700"
                        class="img-fluid rounded shadow">

                </div>

            </div>

        </div>
    </section>

    <!-- Tentang -->
    <section class="py-5" id="tentang">

        <div class="container text-center">

            <h2 class="fw-bold mb-4">
                Tentang Meteor Garden
            </h2>

            <p class="text-muted col-lg-8 mx-auto">
                Meteor Garden merupakan platform kursus online yang menyediakan
                berbagai kelas teknologi, desain, bisnis, dan pengembangan diri.
                Kami berkomitmen membantu setiap peserta memperoleh keterampilan
                yang relevan dengan dunia kerja saat ini.
            </p>

        </div>

    </section>

    <!-- Kelas -->
    <section class="py-5 bg-light" id="kelas">

        <div class="container">

            <h2 class="text-center fw-bold mb-5">
                Kelas Populer
            </h2>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="card course-card shadow-sm h-100">

                        <div class="card-body">

                            <h4>💻 Web Development</h4>

                            <p class="text-muted">
                                Belajar HTML, CSS, Bootstrap,
                                Laravel hingga deployment.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card course-card shadow-sm h-100">

                        <div class="card-body">

                            <h4>📱 Mobile Development</h4>

                            <p class="text-muted">
                                Bangun aplikasi Android menggunakan Flutter
                                dari dasar hingga mahir.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card course-card shadow-sm h-100">

                        <div class="card-body">

                            <h4>🤖 Artificial Intelligence</h4>

                            <p class="text-muted">
                                Pelajari Machine Learning,
                                Computer Vision, dan NLP.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Keunggulan -->
    <section class="py-5" id="keunggulan">

        <div class="container">

            <h2 class="text-center fw-bold mb-5">
                Mengapa Memilih Kami?
            </h2>

            <div class="row text-center">

                <div class="col-md-4">

                    <div class="feature-icon mb-3">
                        🎓
                    </div>

                    <h5>Mentor Profesional</h5>

                    <p class="text-muted">
                        Materi diajarkan oleh praktisi yang berpengalaman.
                    </p>

                </div>

                <div class="col-md-4">

                    <div class="feature-icon mb-3">
                        📜
                    </div>

                    <h5>Sertifikat</h5>

                    <p class="text-muted">
                        Dapatkan sertifikat setelah menyelesaikan kursus.
                    </p>

                </div>

                <div class="col-md-4">

                    <div class="feature-icon mb-3">
                        🌍
                    </div>

                    <h5>Belajar Fleksibel</h5>

                    <p class="text-muted">
                        Akses materi kapan saja dan di mana saja.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="bg-primary text-white py-5">

        <div class="container text-center">

            <h2>
                Siap Memulai Perjalanan Belajarmu?
            </h2>

            <p class="lead">
                Bergabung bersama ribuan peserta lainnya di Meteor Garden.
            </p>

            <a href="/register" class="btn btn-warning btn-lg">
                Daftar Sekarang
            </a>

        </div>

    </section>

    <!-- Footer -->
    <footer class="py-4">

        <div class="container text-center">

            <p class="mb-0">
                © 2026 Meteor Garden. All Rights Reserved.
            </p>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>