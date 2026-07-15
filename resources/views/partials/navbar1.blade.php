<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand fw-bold" href="/dashboard"> Meteor Garden </a> <button
            class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser"> <span
                class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a href="/dashboard" class="nav-link"> Dashboard </a> </li>
                <li class="nav-item"> <a href="/pengumuman" class="nav-link"> Pengumuman </a> </li>
                <li class="nav-item"> <a href="/pendaftaran" class="nav-link"> Pendaftaran </a> </li>
                <li class="nav-item"> <a href="/kelas" class="nav-link"> Kelas </a> </li>
                <li class="nav-item"> <a href="/pembayaran" class="nav-link"> Pembayaran </a> </li>
            </ul> @auth <form action="/logout" method="POST" class="d-flex"> @csrf <button type="submit"
            class="btn btn-outline-danger"> Logout </button> </form> @endauth
        </div>
    </div>
</nav>