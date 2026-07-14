@extends('layouts.app') @section('title', 'Edit Pengguna') @section('content') <div>
        @include('partials.navbar')

        <div>
            <h2>Edit User: {{ $user->name }}</h2>

            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <div>
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('nama', $user->name) }}" required>
                </div>
                <br>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <br>

                <div>
                    <label>Nomor HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" required>
                </div>
                <br>

                <div>
                    <label>Role</label>
                    <select name="role" required>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="peserta" {{ old('role', $user->role) === 'peserta' ? 'selected' : '' }}>Peserta
                        </option>
                    </select>
                </div>
                <br>

                <div>
                    <label>Status Akun</label>
                    <select name="status_akun" required>
                        <option value="pending" {{ old('status_akun', $user->status_akun) === 'pending' ? 'selected' : '' }}>
                            Pending</option>
                        <option value="diterima" {{ old('status_akun', $user->status_akun) === 'diterima' ? 'selected' : '' }}>
                            Diterima</option>
                        <option value="ditolak" {{ old('status_akun', $user->status_akun) === 'ditolak' ? 'selected' : '' }}>
                            Ditolak</option>
                    </select>
                </div>
                <br>

                <button type="submit">Simpan Perubahan</button>
                <a href="{{ route('users.index') }}">Batal</a>
            </form>
        </div>
    </div>
@endsection