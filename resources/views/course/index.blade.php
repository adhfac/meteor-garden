@extends('layouts.app')

@section('title', 'Daftar Kelas Tersedia')

@section('content')
    <div>
        @include('partials.navbar1')

        <h1>Daftar Kelas yang Tersedia</h1>
        <p>Pilih kelas aktif di bawah ini untuk melihat detail informasi.</p>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $index => $c)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $c->nama_kelas }}</strong></td>
                        <td>Rp {{ number_format($c->harga, 2, ',', '.') }}</td>
                        <td>{{ $c->kapasitas }} Kursi</td>
                        <td>{{ $c->tanggal_mulai }}</td>
                        <td>{{ $c->tanggal_selesai }}</td>
                        <td>
                            <a href="{{ route('member.course.show', $c->id) }}">
                                <button type="button">Lihat Detail</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">Saat ini belum ada kelas aktif yang dibuka.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection