<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('users.index') }}">
            <img src="{{ asset('images/meteor.png') }}" alt="Logo" width="35" height="35"
                class="rounded-circle me-2" style="object-fit: cover; border: 2px solid rgba(255,255,255,0.2);">
            Meteor Garden Admin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        Peserta
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengumuman.index') }}"
                        class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">
                        Pengumuman
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('course.index') }}"
                        class="nav-link {{ request()->routeIs('course.*') ? 'active' : '' }}">
                        Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran.index') }}"
                        class="nav-link {{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                        Pembayaran
                    </a>
                </li>
            </ul>
            @auth
                <form action="/logout" method="POST" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger"> Logout </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
