<nav>
    <ul>
        <li><a href="/admin/dashboard">Home</a></li>
        <li><a href="/admin/users">Peserta</a></li>
        <li><a href="/admin/pengumuman">Pengumuman</a></li>
        <li><a href="/admin/course">Kelas</a></li>
        <li><a href="/admin/pembayaran">Pembayaran</a></li>

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