@extends('layouts.app')

@section('title', 'Riwayat Pendaftaran Kelas')

@section('content')
    <div>
        @include('partials.navbar1')

        <h1>Riwayat Pendaftaran Kelas Anda</h1>
        <p>Berikut adalah status pengajuan pendaftaran kelas yang telah Anda ikuti.</p>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Tanggal Daftar</th>
                    <th>Status Pendaftaran</th>
                    <th>Catatan Admin</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendaftarans as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $p->course->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</strong></td>
                        <td>{{ $p->tanggal_daftar }}</td>
                        <td>
                            @if($p->status_pendaftaran === 'diterima')
                                <span style="color: green; font-weight: bold;">DITERIMA</span>
                            @elseif($p->status_pendaftaran === 'pending')
                                <span style="color: orange; font-weight: bold;">PENDING (Menunggu Verifikasi)</span>
                            @else
                                <span style="color: red; font-weight: bold;">DITOLAK</span>
                            @endif
                        </td>
                        <td>{{ $p->catatan_admin ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Anda belum pernah mendaftar di kelas manapun.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <br>
        <a href="{{ route('member.course.index') }}">
            <button type="button">Cari & Daftar Kelas Baru</button>
        </a>
    </div>
@endsection