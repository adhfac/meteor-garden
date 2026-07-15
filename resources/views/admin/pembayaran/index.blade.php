@extends('layouts.app')

@section('title', 'Panel Admin - Verifikasi Pembayaran')

@section('content')

    <div>
        @include('partials.navbar')
        <h2>Manajemen Verifikasi Pembayaran Peserta</h2>

        @if(session('success'))
            <div style="color: green; margin-bottom: 15px; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Kelas</th>
                    <th>Jumlah Tagihan</th>
                    <th>Metode</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pembayarans as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->pendaftaran->user->nama ?? $p->pendaftaran->user->name }}</td>
                        <td><strong>{{ $p->pendaftaran->course->nama_kelas }}</strong></td>
                        <td>Rp {{ number_format($p->jumlah, 2, ',', '.') }}</td>
                        <td>{{ $p->metode_pembayaran }}</td>
                        <td>
                            @if($p->bukti_pembayaran && $p->bukti_pembayaran !== 'belum_upload.png')
                                <a href="{{ asset('storage/bukti_transfer/' . $p->bukti_pembayaran) }}" target="_blank">
                                    Lihat Bukti
                                </a>
                            @else
                                <span style="color: gray; font-style: italic;">Belum Upload</span>
                            @endif
                        </td>
                        <td>
                            @if($p->status_verifikasi === 'diterima')
                                <strong style="color: green;">DITERIMA / LUNAS</strong>
                            @elseif($p->status_verifikasi === 'pending')
                                <strong style="color: orange;">PENDING</strong>
                            @else
                                <strong style="color: red;">DITOLAK</strong>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pembayaran.edit', $p->id) }}">
                                <button type="button">Proses / Ubah Status</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">Belum ada data pembayaran masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection