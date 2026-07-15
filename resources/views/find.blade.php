@extends('layouts.app')

@section('title', 'Meteor Garden - Cek Status')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card shadow-sm">

                    <div class="card-header bg-info text-white text-center">
                        <h4 class="mb-0">Cek Status Verifikasi Akun</h4>
                    </div>

                    <div class="card-body">

                        <p class="text-muted">
                            Masukkan alamat email yang digunakan saat mendaftar untuk
                            melihat status verifikasi akun Anda.
                        </p>

                        <form action="{{ route('users.search') }}" method="GET">

                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    Alamat Email
                                </label>

                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="contoh@email.com" value="{{ $email }}" required>

                            </div>

                            <button type="submit" class="btn btn-info text-white">
                                Cari
                            </button>

                            <a href="/" class="btn btn-secondary">
                                Kembali
                            </a>

                        </form>

                        @if($email)

                            <hr>

                            <h5>
                                Hasil Pencarian
                            </h5>

                            <p>
                                Email:
                                <strong>{{ $email }}</strong>
                            </p>

                            @if($user)

                                <table class="table table-bordered">

                                    <tr>
                                        <th width="35%">Nama Lengkap</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status Akun</th>
                                        <td>

                                            @if($user->status_akun == 'diterima')

                                                <span class="badge bg-success">
                                                    DITERIMA
                                                </span>

                                            @elseif($user->status_akun == 'pending')

                                                <span class="badge bg-warning text-dark">
                                                    PENDING
                                                </span>

                                            @else

                                                <span class="badge bg-danger">
                                                    DITOLAK
                                                </span>

                                            @endif

                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Pembaruan Terakhir</th>
                                        <td>{{ $user->updated_at }}</td>
                                    </tr>

                                </table>

                            @else

                                <div class="alert alert-danger mt-3">

                                    Data pengguna dengan email tersebut tidak ditemukan.

                                </div>

                            @endif

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection