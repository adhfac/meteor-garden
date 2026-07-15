<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteor Garden | Kursus Online</title>

</head>

<body>
    @guest
        <li>
            <a href="{{ route('login') }}">
                Login
            </a>
        </li>

        <li >
            <a href="{{ route('register') }}" >
                Daftar
            </a>
        </li>
    @endguest
    
    @auth
        <li >
            <a href="/dashboard" >
                Dashboard
            </a>
        </li>

        <li >
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" >
                    Logout
                </button>
            </form>
        </li>
    @endauth

    <a href="/cek-status">
        Cek Akun Anda
    </a>
</body>

</html>