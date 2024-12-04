<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Menu')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">

    <link rel="stylesheet" href="{{ asset('css/layouts/admin.css') }}">
    @stack('css')
</head>

<body>
    <div id="desktop-warning" class="container">
        <p>
            <strong>Halaman ini hanya dapat diakses melalui perangkat desktop.</strong><br> Silakan buka kembali
            menggunakan komputer atau layar yang lebih besar.
        </p>
    </div>

    <div id="desktop-content" class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white p-3 vh-100">
                <div class="text-center">
                    <img src="{{ asset('assets/logo/logo-100x100.png') }}" alt="Logo"
                        class="img-fluid rounded-circle mb-3" style="width: 80px;">
                    <h5>{{ session('name') }}</h5>
                    <h6 class="text-secondary text-capitalize">({{ session('role') }})</h6>
                </div>

                <hr level="5" class="text-danger">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/manage-users') ? 'active' : '' }}"
                            href="{{ route('admin.user.index') }}">Kelola User</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#settingsCollapse" role="button"
                            aria-expanded="false" aria-controls="settingsCollapse">
                            Pengaturan Halaman <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="collapse" id="settingsCollapse">
                            <a class="nav-link ms-4" data-bs-toggle="collapse" href="#profilCollapse" role="button"
                                aria-expanded="false" aria-controls="profilCollapse">
                                Profil <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="collapse" id="profilCollapse">
                                <a class="nav-link ms-5" href="{{ route('admin.accreditations.index') }}">Akreditasi</a>
                            </div>

                            <a class="nav-link ms-4" data-bs-toggle="collapse" href="#kegiatanCollapse" role="button"
                                aria-expanded="false" aria-controls="kegiatanCollapse">
                                Kegiatan <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="collapse" id="kegiatanCollapse">
                                <a class="nav-link ms-5"
                                    href="{{ route('admin.extracurricular.index') }}">Ekstrakurikuler</a>
                                {{-- <a class="nav-link ms-5" href="{{ route('admin.activityreport.index') }}">Laporan
                                    Kegiatan</a> --}}
                            </div>

                            <a class="nav-link ms-4" data-bs-toggle="collapse" href="#informasiCollapse" role="button"
                                aria-expanded="false" aria-controls="informasiCollapse">
                                Informasi <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="collapse" id="informasiCollapse">
                                <a class="nav-link ms-5" href="{{ route('admin.news') }}">Tambah Berita</a>
                                <a class="nav-link ms-5" href="{{ route('admin.majors.index') }}">Jurusan</a>
                                <a class="nav-link ms-5" href="{{ route('admin.facility.index') }}">Fasilitas</a>
                                <a class="nav-link ms-5" href="{{ route('admin.achievements.index') }}">Prestasi</a>
                                <a class="nav-link ms-5" href="{{ route('admin.teachers.index') }}">Daftar Guru</a>
                                <a class="nav-link ms-5" href="{{ route('admin.students.index') }}">Data Siswa</a>
                                <a class="nav-link ms-5" href="{{ route('admin.subjects.index') }}">Daftar
                                    Pelajaran</a>
                                <a class="nav-link ms-5" href="{{ route('admin.graduations.index') }}">Pengumuman
                                    Kelulusan</a>
                            </div>

                            <a class="nav-link ms-4" data-bs-toggle="collapse" href="#galleryCollapse" role="button"
                                aria-expanded="false" aria-controls="galleryCollapse">
                                Gallery <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="collapse" id="galleryCollapse">
                                <a class="nav-link ms-5"
                                    href="{{ route('admin.galleries.index', ['type' => 'photo']) }}">Photo</a>
                            </div>


                            {{-- Menu lama --}}
                            {{-- <a class="nav-link ms-4" data-bs-toggle="collapse" href="#galleryCollapse" role="button"
                                aria-expanded="false" aria-controls="galleryCollapse">
                                Gallery <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="collapse" id="galleryCollapse">
                                <a class="nav-link ms-5"
                                    href="{{ route('admin.galleries.index', ['type' => 'photo']) }}">Photo Gallery</a>
                                <a class="nav-link ms-5"
                                    href="{{ route('admin.galleries.index', ['type' => 'video']) }}">Video Gallery</a>

                            </div> --}}
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('') ? 'active' : '' }}" href="">Rekap</a>
                    </li>

                    <li class="nav-item ms-3">
                        <form action="{{ route('admin.user.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="no-border nav-link text-danger">Logout</button>
                        </form>
                </ul>
            </nav>

            <main id="content" class="col-md-9 col-lg-10 ms-sm-auto px-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>@yield('page-title', 'Admin Panel')</h2>
                    <button class="btn btn-primary" id="refreshBtn">Refresh</button>
                </div>
                <div>
                    @yield('content')
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/js/bootstrap-datepicker.min.js"></script>

        @stack('js')
</body>

</html>
