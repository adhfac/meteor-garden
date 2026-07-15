@extends('layouts.app')
@section('title', 'Panel Admin - Verifikasi Pembayaran')
@section('content')
    @include('partials.navbar')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Nama Peserta'],
            ['label' => 'Kelas'],
            ['label' => 'Jumlah Tagihan'],
            ['label' => 'Metode'],
            ['label' => 'Bukti'],
            ['label' => 'Status'],
            ['label' => 'Aksi', 'width' => '150'],
        ];
    @endphp

    <x-table-card title="Manajemen Verifikasi Pembayaran Peserta" :headers="$headers"
        emptyMessage="Belum ada data pembayaran masuk." :createRoute="null">
        @forelse ($pembayarans as $index => $p)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $p->pendaftaran->user->nama ?? $p->pendaftaran->user->name }}</td>
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
                    @if ($p->bukti_pembayaran && $p->bukti_pembayaran !== 'belum_upload.png')
                        <a href="{{ asset('storage/bukti_transfer/' . $p->bukti_pembayaran) }}" target="_blank"
                            class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Lihat Bukti
                        </a>
                    @else
                        <span class="badge bg-secondary">
                            <i class="bi bi-cloud-slash"></i> Belum Upload
                        </span>
                    @endif
                </td>
                <td>
                    @if ($p->status_verifikasi === 'diterima')
                        <span class="badge bg-success" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle"></i> DITERIMA / LUNAS
                        </span>
                    @elseif($p->status_verifikasi === 'pending')
                        <span class="badge bg-warning text-dark" style="font-size: 0.9rem;">
                            <i class="bi bi-clock"></i> PENDING
                        </span>
                    @else
                        <span class="badge bg-danger" style="font-size: 0.9rem;">
                            <i class="bi bi-x-circle"></i> DITOLAK
                        </span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Proses
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                    <p class="mb-0">Belum ada data pembayaran masuk.</p>
                </td>
            </tr>
        @endforelse
    </x-table-card>

@endsection
