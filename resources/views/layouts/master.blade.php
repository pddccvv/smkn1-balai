<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'SMK Negeri 1 Balai')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="{{ asset('css/layouts/master.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
</head>

<body>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid m-0 p-0">
                <a class="navbar-brand navbar-brand-custom fw-bold d-flex align-items-center text-danger rounded-start position-relative z-index-1"
                    href="#">
                    <img src="{{ asset('/assets/logo/logo-100x100.png') }}" alt="Logo" width="50" height="50"
                        class="me-2">
                    SMK Negeri 1 Balai
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav navbar-menu-wrapper ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownProfil"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdownProfil">
                                <li><a class="dropdown-item" href="{{ route('profile.about') }}">Tentang Sekolah</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profile.welcome') }}">Sambutan Kepala
                                        Sekolah</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.future') }}">Visi dan Misi</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profile.organizational') }}">Struktur
                                        Organisasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.accreditation') }}">Akreditasi
                                        dan Informasi</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownKegiatan"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kegiatan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownKegiatan">
                                <li><a class="dropdown-item"
                                        href="{{ route('activity.extracurricular') }}">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="{{ route('activity.report') }}">Laporan
                                        Kegiatan</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownInformasi"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownInformasi">
                                <li><a class="dropdown-item" href="{{ route('information.major') }}">Jurusan</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('information.facility') }}">Fasilitas</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('information.achievement') }}">Prestasi</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('information.teachers') }}">Daftar
                                        Guru</a></li>
                                <li><a class="dropdown-item" href="{{ route('information.students') }}">Data Jumlah
                                        Siswa</a></li>
                                <li><a class="dropdown-item" href="https://sanggau.siap-ppdb.com/" target="_blank">PPDB
                                        Online</a></li>
                                <li><a class="dropdown-item" href="{{ route('information.timetable') }}">Jadwal
                                        Pelajaran</a></li>
                                <li><a class="dropdown-item" href="{{ route('information.news') }}">Berita</a></li>
                                <li><a class="dropdown-item" href="{{ route('information.graduation') }}">Pengumuman
                                        Kelulusan</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownGalery"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Galeri
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownGalery">
                                <li><a class="dropdown-item" href="{{ route('gallery.photos') }}">Foto</a></li>
                                <li><a class="dropdown-item" href="{{ route('gallery.videos') }}">Video</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('contact') }}">Kontak</a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="{{ route('filament.auth.login') }}">Login</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="container content">
        @yield('content')
    </div>

    <footer class="bg-dark text-white py-4 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="m-0">© 2024 SMK Negeri 1 Balai. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    @stack('js')
</body>

</html>
