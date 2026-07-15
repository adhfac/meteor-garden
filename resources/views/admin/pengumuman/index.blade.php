@extends('layouts.app')
@section('title', 'Meteor Garden')
@section('content')
    @include('partials.navbar')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Judul'],
            ['label' => 'Isi Pengumuman'],
            ['label' => 'Penulis'],
            ['label' => 'Tanggal Publish'],
            ['label' => 'Aksi', 'width' => '150'],
        ];
    @endphp

    <x-table-card title="Data Pengumuman" :headers="$headers" createRoute="{{ route('pengumuman.create') }}"
        createText="Buat Pengumuman Baru" emptyMessage="Belum ada pengumuman yang diterbitkan.">
        @forelse ($pengumumans as $index => $pengumuman)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $pengumuman->judul }}</strong></td>
                <td>{{ Str::limit($pengumuman->isi, 100) }}</td>
                <td>{{ $pengumuman->admin->name ?? 'Tidak diketahui' }}</td>
                <td>{{ $pengumuman->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <x-action-buttons editRoute="pengumuman.edit" deleteRoute="pengumuman.destroy" :id="$pengumuman->id"
                        deleteMessage="Yakin ingin menghapus pengumuman ini?" />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-info-circle" style="font-size: 1.5rem;"></i>
                    <p class="mt-2 mb-0">{{ $emptyMessage ?? 'Belum ada data yang tersedia.' }}</p>
                </td>
            </tr>
        @endforelse
    </x-table-card>

@endsection
