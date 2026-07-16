<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/dashboard">
            <img src="{{ asset('images/meteor.png') }}" alt="Logo" width="35" height="35"
                class="rounded-circle me-2" style="object-fit: cover; border: 2px solid rgba(255,255,255,0.2);">
            Meteor Garden
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pengumuman" class="nav-link {{ request()->is('pengumuman*') ? 'active' : '' }}">
                        Pengumuman
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pendaftaran" class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}">
                        Pendaftaran
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelas" class="nav-link {{ request()->is('kelas*') ? 'active' : '' }}">
                        Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pembayaran" class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}">
                        Pembayaran
                    </a>
                </li>
            </ul>
            @auth
                <form action="/logout" method="POST" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
