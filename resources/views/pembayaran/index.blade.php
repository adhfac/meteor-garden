@extends('layouts.app')

@section('title', 'Riwayat & Tagihan Pembayaran')

@section('content')
    <div>
        @include('partials.navbar1')

        <h1>Tagihan Pembayaran Anda</h1>

        @if(session('success'))
            <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Total Tagihan</th>
                    <th>Metode</th>
                    <th>Status Verifikasi</th>
                    <th>Catatan Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pembayarans as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $p->pendaftaran->course->nama_kelas }}</strong></td>
                        <td>Rp {{ number_format($p->jumlah, 2, ',', '.') }}</td>
                        <td>{{ $p->metode_pembayaran }}</td>
                        <td>
                            @if($p->status_verifikasi === 'diterima')
                                <span style="color: green; font-weight: bold;">LUNAS / DITERIMA</span>
                            @elseif($p->status_verifikasi === 'pending')
                                <span style="color: orange; font-weight: bold;">PENDING (Dicek Admin)</span>
                            @else
                                <span style="color: red; font-weight: bold;">DITOLAK</span>
                            @endif
                        </td>
                        <td>{{ $p->catatan_admin ?? '-' }}</td>
                        <td>
                            @if($p->status_verifikasi !== 'diterima')
                                <a href="{{ route('member.pembayaran.edit', $p->id) }}">
                                    <button type="button">Konfirmasi Bayar / Upload</button>
                                </a>
                            @else
                                <span style="color: green;">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">Belum ada riwayat tagihan pendaftaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection