@extends('layouts.app')
@section('title', 'Riwayat & Tagihan Pembayaran')
@section('content')
    @include('partials.navbar1')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Nama Kelas'],
            ['label' => 'Total Tagihan', 'width' => '150'],
            ['label' => 'Metode'],
            ['label' => 'Status Verifikasi'],
            ['label' => 'Catatan Admin'],
            ['label' => 'Aksi', 'width' => '150'],
        ];
    @endphp

    <x-table-card title="Tagihan Pembayaran Anda" :headers="$headers" emptyMessage="Belum ada riwayat tagihan pendaftaran."
        :createRoute="null">
        @forelse ($pembayarans as $index => $p)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $p->pendaftaran->course->nama_kelas }}</strong></td>
                <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                <td>
                    @if ($p->metode_pembayaran == 'transfer_bank')
                        <span class="badge bg-info">Transfer Bank</span>
                    @elseif($p->metode_pembayaran == 'cash')
                        <span class="badge bg-success">Cash</span>
                    @else
                        <span class="badge bg-secondary">{{ $p->metode_pembayaran }}</span>
                    @endif
                </td>
                <td>
                    @if ($p->status_verifikasi === 'diterima')
                        <span class="badge bg-success" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle"></i> LUNAS / DITERIMA
                        </span>
                    @elseif($p->status_verifikasi === 'pending')
                        <span class="badge bg-warning text-dark" style="font-size: 0.9rem;">
                            <i class="bi bi-clock"></i> PENDING (Dicek Admin)
                        </span>
                    @else
                        <span class="badge bg-danger" style="font-size: 0.9rem;">
                            <i class="bi bi-x-circle"></i> DITOLAK
                        </span>
                    @endif
                </td>
                <td>{{ $p->catatan_admin ?? '-' }}</td>
                <td>
                    @if ($p->status_verifikasi !== 'diterima')
                        <a href="{{ route('member.pembayaran.edit', $p->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-upload"></i> Konfirmasi Bayar
                        </a>
                    @else
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle"></i> Selesai
                        </span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                    <p class="mb-0">Belum ada riwayat tagihan pendaftaran.</p>
                    <a href="{{ route('member.course.index') }}" class="btn btn-primary btn-sm mt-3">
                        <i class="bi bi-search"></i> Cari Kelas & Daftar Sekarang
                    </a>
                </td>
            </tr>
        @endforelse
    </x-table-card>

    {{-- Tombol di luar card --}}
    @if ($pembayarans->count() > 0)
        <div class="container">
            <div class="mt-3">
                <a href="{{ route('member.course.index') }}" class="btn btn-primary">
                    <i class="bi bi-search"></i> Cari Kelas & Daftar Sekarang
                </a>
            </div>
        </div>
    @endif

@endsection
