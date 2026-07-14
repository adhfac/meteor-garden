@extends('layouts.app') @section('title', 'Pengguna') @section('content') <div>
            @include('partials.navbar')

            <div>

                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Role</th>
                            <th>Status Akun</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->status_akun }}</td>
                                <td>{{ $user->tanggal_daftar }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    |
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE') <button type="submit"
                                            style="color: red; background: none; border: none; cursor: pointer; padding: 0; font-family: inherit; font-size: inherit;">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </div>
@endsection