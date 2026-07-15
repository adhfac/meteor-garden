@extends('layouts.app')
@section('title', 'Riwayat Pendaftaran Kelas')
@section('content')
    @include('partials.navbar1')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Nama Kelas'],
            ['label' => 'Tanggal Daftar', 'width' => '150'],
            ['label' => 'Status Pendaftaran'],
            ['label' => 'Catatan Admin'],
        ];
    @endphp

    <x-table-card title="Riwayat Pendaftaran Kelas Anda" :headers="$headers"
        emptyMessage="Anda belum pernah mendaftar di kelas manapun." :createRoute="null">
        @forelse ($pendaftarans as $index => $p)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $p->course->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</strong></td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_daftar)->format('d/m/Y H:i') }}</td>
                <td>
                    @if ($p->status_pendaftaran === 'diterima')
                        <span class="badge bg-success" style="font-size: 0.9rem;">
                            <i class="bi bi-check-circle"></i> DITERIMA
                        </span>
                    @elseif($p->status_pendaftaran === 'pending')
                        <span class="badge bg-warning text-dark" style="font-size: 0.9rem;">
                            <i class="bi bi-clock"></i> PENDING (Menunggu Verifikasi)
                        </span>
                    @else
                        <span class="badge bg-danger" style="font-size: 0.9rem;">
                            <i class="bi bi-x-circle"></i> DITOLAK
                        </span>
                    @endif
                </td>
                <td>{{ $p->catatan_admin ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                    <p class="mb-0">Anda belum pernah mendaftar di kelas manapun.</p>
                    <a href="{{ route('member.course.index') }}" class="btn btn-primary btn-sm mt-3">
                        <i class="bi bi-search"></i> Cari & Daftar Kelas Baru
                    </a>
                </td>
            </tr>
        @endforelse
    </x-table-card>

    {{-- Tombol di luar card (opsional, jika ingin tetap ada) --}}
    @if ($pendaftarans->count() > 0)
        <div class="container">
            <div class="mt-3">
                <a href="{{ route('member.course.index') }}" class="btn btn-primary">
                    <i class="bi bi-search"></i> Cari & Daftar Kelas Baru
                </a>
            </div>
        </div>
    @endif

@endsection
