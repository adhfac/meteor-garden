@extends('layouts.app') @section('title', 'Manajemen Kelas') @section('content') <div>
        @include('partials.navbar')
        <h1>Manajemen Kelas</h1>

        <a href="{{ route('course.create') }}">Tambah Kelas Baru</a>
        <br><br>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
            <br>
        @endif

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $index => $c)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $c->nama_kelas }}</strong></td>
                        <td>Rp {{ number_format($c->harga, 2, ',', '.') }}</td>
                        <td>{{ $c->kapasitas }} orang</td>
                        <td>{{ $c->tanggal_mulai }}</td>
                        <td>{{ $c->tanggal_selesai }}</td>
                        <td>{{ $c->status }}</td>
                        <td>
                            <a href="{{ route('course.edit', $c->id) }}">Edit</a> |
                            <form action="{{ route('course.destroy', $c->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Hapus kelas ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="color:red; background:none; border:none; cursor:pointer; padding:0;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;">Belum ada data kelas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection