@extends('layouts.app')
@section('title', 'Manajemen Kelas')
@section('content')
    @include('partials.navbar')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Nama Kelas'],
            ['label' => 'Harga'],
            ['label' => 'Kapasitas'],
            ['label' => 'Mulai'],
            ['label' => 'Selesai'],
            ['label' => 'Status'],
            ['label' => 'Aksi', 'width' => '150'],
        ];
    @endphp

    <x-table-card title="Manajemen Kelas" :headers="$headers" createRoute="{{ route('course.create') }}"
        createText="Tambah Kelas Baru" emptyMessage="Belum ada data kelas.">
        @forelse ($courses as $index => $course)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $course->nama_kelas }}</strong></td>
                <td>Rp {{ number_format($course->harga, 0, ',', '.') }}</td>
                <td class="text-center">{{ $course->kapasitas }} orang</td>
                <td>{{ \Carbon\Carbon::parse($course->tanggal_mulai)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($course->tanggal_selesai)->format('d/m/Y') }}</td>
                <td>
                    @if ($course->status == 'aktif')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-danger">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <x-action-buttons editRoute="course.edit" deleteRoute="course.destroy" :id="$course->id"
                        deleteMessage="Yakin ingin menghapus kelas ini?" />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-info-circle" style="font-size: 1.5rem;"></i>
                    <p class="mt-2 mb-0">Belum ada data kelas.</p>
                </td>
            </tr>
        @endforelse
    </x-table-card>

@endsection
