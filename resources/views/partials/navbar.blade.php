<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand fw-bold" href="/admin/dashboard"> Meteor Garden Admin </a> <button
            class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin"> <span
                class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a href="/admin/users" class="nav-link"> Peserta </a> </li>
                <li class="nav-item"> <a href="/admin/pengumuman" class="nav-link"> Pengumuman </a> </li>
                <li class="nav-item"> <a href="/admin/course" class="nav-link"> Kelas </a> </li>
                <li class="nav-item"> <a href="/admin/pembayaran" class="nav-link"> Pembayaran </a> </li>
            </ul> @auth <form action="/logout" method="POST" class="d-flex"> @csrf <button type="submit"
                    class="btn btn-outline-danger"> Logout </button> </form> @endauth
        </div>
    </div>
</nav>
