@extends('layouts.app')

@section('title', 'Detail Kelas - ' . $course->nama_kelas)

@section('content')
    <div>
        @include('partials.navbar1')

        <h1>Detail Kelas</h1>
        <hr>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th align="left" width="150">Nama Kelas</th>
                <td><strong>{{ $course->nama_kelas }}</strong></td>
            </tr>
            <tr>
                <th align="left">Deskripsi</th>
                <td>{{ $course->deskripsi }}</td>
            </tr>
            <tr>
                <th align="left">Harga</th>
                <td>Rp {{ number_format($course->harga, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th align="left">Kapasitas</th>
                <td>{{ $course->kapasitas }} Peserta</td>
            </tr>
            <tr>
                <th align="left">Tanggal Mulai</th>
                <td>{{ $course->tanggal_mulai }}</td>
            </tr>
            <tr>
                <th align="left">Tanggal Selesai</th>
                <td>{{ $course->tanggal_selesai }}</td>
            </tr>
            <tr>
                <th align="left">Status</th>
                <td>
                    <span style="color: green; font-weight: bold;">
                        {{ strtoupper($course->status) }}
                    </span>
                </td>
            </tr>
        </table>

        <br><br>
        <form action="{{ route('member.pendaftaran.store', $course->id) }}" method="POST" style="display: inline;"
            onsubmit="return confirm('Apakah Anda yakin ingin mendaftar ke kelas ini? Tagihan pembayaran akan otomatis diterbitkan.');">
            @csrf
            <button type="submit"
                style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer; font-weight: bold;">
                Daftar Kelas Sekarang
            </button>
        </form>
        <a href="{{ route('member.course.index') }}">
            <button type="button">Kembali ke Daftar Kelas</button>
        </a>
    </div>
@endsection