<nav>
    <ul>
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/pengumuman">Pengumuman</a></li>
        <li><a href="/pendaftaran">Pendaftaran</a></li>
        <li><a href="/course">Kelas</a></li>
        <li><a href="/pembayaran">Pembayaran</a></li>

        @auth
            <li>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>