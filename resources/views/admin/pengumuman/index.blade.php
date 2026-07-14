@extends('layouts.app') @section('title', 'Meteor Garden') @section('content') <div>
    @include('partials.navbar')

    <h1>Pengumuman</h1>

    <a href="{{ route('pengumuman.create') }}">Buat Pengumuman Baru</a>
    <br><br>

    @if (session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi Pengumuman</th>
                <th>Penulis (Admin ID)</th>
                <th>Tanggal Publish</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengumumans as $index => $pengumuman)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $pengumuman->judul }}</strong></td>
                    <td>{{ Str::limit($pengumuman->isi, 100) }}</td>
                    <td>{{ $pengumuman->admin->name ?? 'No username' }}</td>
                    <td>{{ $pengumuman->updated_at }}</td>
                    <td>
                        <a href="{{ route('pengumuman.edit', $pengumuman->id) }}">Edit</a>
                        <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="color: red; background: none; border: none; cursor: pointer; padding: 0;">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada pengumuman yang diterbitkan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
@endsection