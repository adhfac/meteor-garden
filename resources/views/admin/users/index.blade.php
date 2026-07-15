@extends('layouts.app')
@section('title', 'Pengguna')
@section('content')
    @include('partials.navbar')

    @php
        $headers = [
            ['label' => 'No', 'width' => '50'],
            ['label' => 'Nama'],
            ['label' => 'Email'],
            ['label' => 'No HP'],
            ['label' => 'Role'],
            ['label' => 'Status Akun'],
            ['label' => 'Tanggal Daftar'],
            ['label' => 'Aksi', 'width' => '130'],
        ];
    @endphp

    <x-table-card title="Data Pengguna" :headers="$headers" createRoute="{{ route('users.create') }}"
        createText="Tambah Pengguna" emptyMessage="Belum ada data pengguna.">
        @forelse ($users as $index => $user)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->no_hp }}</td>
                <td>
                    @if ($user->role == 'admin')
                        <span class="badge bg-danger">Admin</span>
                    @else
                        <span class="badge bg-primary">Peserta</span>
                    @endif
                </td>
                <td>
                    @if ($user->status_akun == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                    @elseif($user->status_akun == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>{{ $user->tanggal_daftar }}</td>
                <td>
                    <x-action-buttons editRoute="users.edit" deleteRoute="users.destroy" :id="$user->id"
                        deleteMessage="Yakin ingin menghapus user ini?" />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($headers) }}" class="text-center py-4">
                    <i class="bi bi-info-circle" style="font-size: 1.5rem;"></i>
                    <p class="mt-2 mb-0">Belum ada data pengguna.</p>
                </td>
            </tr>
        @endforelse
    </x-table-card>

@endsection
