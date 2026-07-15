@extends('layouts.app')

@section('title', 'Meteor Garden - Cek Status')

@section('content')
    <div>
        <h2>Cek Status Verifikasi Akun Peserta</h2>
        <p>Masukkan alamat email yang Anda gunakan saat mendaftar untuk melihat status verifikasi terbaru.</p>

        <form action="{{ route('users.search') }}" method="GET">
            <div>
                <label for="email">Alamat Email:</label><br>
                <input type="email" id="email" name="email" value="{{ $email }}" required placeholder="contoh@email.com"
                    size="30">
                <button type="submit">Cari</button>
            </div>
        </form>

        <br><br>
        <hr>
        <br>

        @if($email)
            <h3>Hasil Pencarian untuk: <em>{{ $email }}</em></h3>

            @if($user)
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Status Akun</th>
                        <td>
                            @if($user->status_akun === 'diterima')
                                <strong style="color: green;">DITERIMA</strong>
                            @elseif($user->status_akun === 'pending')
                                <strong style="color: orange;">PENDING (Dalam Verifikasi)</strong>
                            @else
                                <strong style="color: red;">DITOLAK</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Pembaruan Terakhir</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </table>
            @else
                <div style="color: red; font-weight: bold;">
                    Maaf, data pengguna dengan email tersebut tidak ditemukan dalam sistem kami.
                </div>
            @endif
        @endif

        <a href="/">
            Kembali
        </a>
    </div>
@endsection