@extends('layouts.app')
@section('title', 'Daftar Kelas Tersedia')
@section('content')
    @include('partials.navbar1')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Nama Kelas'],
            ['label' => 'Harga'],
            ['label' => 'Kapasitas'],
            ['label' => 'Tanggal Mulai'],
            ['label' => 'Tanggal Selesai'],
            ['label' => 'Aksi', 'width' => '130'],
        ];
    @endphp

    <x-table-card title="Daftar Kelas yang Tersedia" :headers="$headers"
        emptyMessage="Saat ini belum ada kelas aktif yang dibuka." :createRoute="null">
        @forelse ($courses as $index => $course)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $course->nama_kelas }}</strong></td>
                <td>Rp {{ number_format($course->harga, 0, ',', '.') }}</td>
                <td class="text-center">{{ $course->kapasitas }} Kursi</td>
                <td>{{ \Carbon\Carbon::parse($course->tanggal_mulai)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($course->tanggal_selesai)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('member.course.show', $course->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                    <p class="mb-0">Saat ini belum ada kelas aktif yang dibuka.</p>
                </td>
            </tr>
        @endforelse
    </x-table-card>

@endsection
