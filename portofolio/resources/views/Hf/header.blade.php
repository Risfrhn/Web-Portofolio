<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- aos(animasi on scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- swaetallert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hoverbutton-inline:hover {
            background-color: blue;
            color: white;
        }

        @media (min-width: 768px) {
            .img-md-200 {
                width: 200px;
                height: 200px;
                object-fit: cover;
            }
        }

    </style>


    <!-- title web -->
    <title>Welcome</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-white">
        <div class="container">
            @if(auth()->check())
                <a href="{{ route('dashboardAdmin') }}"><img src="{{ asset('Gambar/logo_nobg.png') }}" height="50px" width="50px"alt="Tidak terbaca"></a>
            @else
                <a href="{{ route('dashboardPengguna') }}"><img src="{{ asset('Gambar/logo_nobg.png') }}" height="50px" width="50px"alt="Tidak terbaca"></a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(auth()->check() && request()->routeIs('dashboardAdmin'))
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" aria-current="page" href="{{ route('dashboardAdmin') }}#halaman-utama-admin">Halaman utama</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="{{ route('dashboardAdmin') }}#halaman-tentangSaya-admin">Tentang saya</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="{{ route('dashboardAdmin') }}#halaman-projek-admin">Projek</a>
                    </li>
                    @if(request()->routeIs('dashboardAdmin'))
                        <li class="nav-item me-2">
                            <a type="button" class="btn btn-outline-primary" href="{{ route('action.logout') }}">Keluar</a>
                        </li>
                    @endif
                </ul>
                @elseif(request()->routeIs('dashboardPengguna'))
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" aria-current="page" href="{{ route('dashboardPengguna') }}#halaman-utama">Halaman utama</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="{{ route('dashboardPengguna') }}#halaman-tentangSaya">Tentang saya</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" href="{{ route('dashboardPengguna') }}#halaman-projek">Projek</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>