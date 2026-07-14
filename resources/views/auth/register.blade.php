@extends('layouts.app') @section('title', 'Daftar Akun') @section('content') <div>
    <div>
        <h2>Daftar Akun Baru</h2>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div>
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label>Nomor HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <p>
            Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>
        </p>
    </div>
    </div>
@endsection