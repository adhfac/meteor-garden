<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Aplikasi LSP')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/meteor.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
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

        .hover-card {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .hover-card:active {
            transform: scale(0.97);
        }

        /* Active link style */
        .navbar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            font-weight: 600;
            color: #fff !important;
        }

        /* Hover effect */
        .navbar .nav-link {
            padding: 8px 16px;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .navbar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 5px;
        }

        /* Logout button */
        .btn-outline-danger {
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body>
    @yield('content')

    <script>
        document.querySelector('input[name="bukti_pembayaran"]').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');

            if (file) {
                // Validasi ukuran file
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    this.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }

                // Validasi tipe file
                const allowedTypes = ['image/jpeg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.');
                    this.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#4F46E5', // Warna Indigo sesuai tema
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif


            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#111827' // Warna gelap sesuai tema
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Failed!',
                    html: `
                        <ul class="text-left text-sm text-red-500 list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                    confirmButtonColor: '#111827'
                });
            @endif
        });
    </script>
</body>

</html>
