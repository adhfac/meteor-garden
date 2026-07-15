@extends('layouts.app')
@section('title', 'Berita Kursus')
@section('content')
    @include('partials.navbar1')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Judul'],
            ['label' => 'Isi Pengumuman'],
            ['label' => 'Penulis'],
            ['label' => 'Tanggal Publish', 'width' => '180'],
            ['label' => 'Lihat Aksi'],
        ];
    @endphp

    <x-table-card title="Pengumuman" :headers="$headers" emptyMessage="Belum ada pengumuman yang diterbitkan."
        :createRoute="null">
        @forelse ($pengumumans as $index => $pengumuman)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $pengumuman->judul }}</strong></td>
                <td>{{ Str::limit($pengumuman->isi, 100) }}</td>
                <td>{{ $pengumuman->admin->name ?? 'Tidak diketahui' }}</td>
                <td>{{ \Carbon\Carbon::parse($pengumuman->updated_at)->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('member.pengumuman.show', $pengumuman->id) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-info-circle" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                    <p class="mb-0">Belum ada pengumuman yang diterbitkan.</p>
                </td>
            </tr>
        @endforelse
    </x-table-card>

@endsection
