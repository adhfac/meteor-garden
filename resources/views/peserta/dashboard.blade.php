@extends('layouts.app') @section('title', 'Meteor Garden') @section('content') <div>
        @include('partials.navbar1')
        <h1>Peserta</h1>
        @auth
            <li class="nav-item ms-2">
                <a href="/dashboard" class="btn btn-outline-info btn-sm">
                    Dashboard
                </a>
            </li>

            <li class="nav-item ms-2">
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Logout
                    </button>
                </form>
            </li>
        @endauth
    </div>
@endsection
