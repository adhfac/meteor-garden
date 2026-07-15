@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow-sm">

                    <div class="card-header bg-success text-white text-center">
                        <h4 class="mb-0">Daftar Akun Baru</h4>
                    </div>

                    <div class="card-body">

                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>

                        @endif

                        <form action="{{ url('/register') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Daftar
                            </button>

                        </form>

                        <p class="text-center mt-3 mb-0">
                            Sudah punya akun?
                            <a href="{{ route('login') }}">
                                Login disini
                            </a>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection