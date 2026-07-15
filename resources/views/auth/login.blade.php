@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow-sm">

                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0">Login</h4>
                    </div>

                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>

                        </form>

                        <p class="text-center mt-3 mb-0">
                            Belum punya akun?
                            <a href="{{ route('register') }}">
                                Daftar disini
                            </a>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection