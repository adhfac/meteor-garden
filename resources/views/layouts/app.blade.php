<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Aplikasi LSP')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/meteor.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333333;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Libre Baskerville', Georgia, serif;
        }

        .page-container {
            max-width: 900px;
            margin: 30px auto;
        }

        .card-form {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
        }

        .table-custom {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-custom thead th {
            vertical-align: middle;
        }

        .table-custom td,
        .table-custom th {
            padding: 12px;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>