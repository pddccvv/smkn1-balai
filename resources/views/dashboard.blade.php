@extends('layouts.master')

@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="m-0 p-0">
            <img src="{{ asset('assets/img/taman-smk.jpeg') }}" class="img-fluid" alt="taman smk">
        </div>
        <div class="text-center mt-3">
            <h2 class="mb-4 fw-bolder text-danger">SELAMAT DATANG</h2>

            <div class="row gap-2">
                @foreach ([['url' => 'https://sanggau.siap-ppdb.com/', 'icon' => 'ico-ppdb.png', 'label' => 'PPDB Online'], ['route' => 'profile.future', 'icon' => 'ico-visimisi.png', 'label' => 'Visi dan Misi'], ['route' => 'profile.future', 'icon' => 'ico-kepalasekolah.png', 'label' => 'Sambutan Kepala Sekolah'], ['route' => 'information.teachers', 'icon' => 'ico-guru.png', 'label' => 'Daftar Guru'], ['route' => 'information.major', 'icon' => 'ico-jurusan.png', 'label' => 'Daftar Jurusan'], ['route' => 'information.students', 'icon' => 'ico-siswa.png', 'label' => 'Data Jumlah Siswa'], ['route' => 'information.achievement', 'icon' => 'ico-prestasi.png', 'label' => 'Prestasi']] as $menu)
                    <div class="col border border-secondary rounded p-3 menu-item pe-auto"
                        onclick="window.open('{{ $menu['url'] ?? route($menu['route']) }}', '_blank')">
                        <a class="fw-bold text-dark d-flex flex-column align-items-center text-decoration-none"
                            href="{{ $menu['url'] ?? route($menu['route']) }}" target="_blank">
                            <img src="{{ asset('assets/icon/' . $menu['icon']) }}" alt="Logo" width="50"
                                height="50" class="mb-2">
                            {{ $menu['label'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <hr size="4" class="text-danger">

            <div class="text-center my-5">
                <h3 class="mb-4 fw-bolder text-danger">BERITA TERBARU</h3>

                <div class="mb-5">
                    <img src="{{ asset('assets/img/brosur-pendaftaran.jpg') }}" class="img-fluid" alt="Brosur Pendaftaran">
                </div>

                <div class="row justify-content-center">
                    @if ($news->isEmpty())
                        <div class="col-md-8 text-center">
                            <p class="text-muted">Belum ada berita yang tersedia.</p>
                        </div>
                    @else
                        @foreach ($news as $item)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    @php
                                        $thumbnailUrl = file_exists(public_path('storage/' . $item->thumbnail))
                                            ? asset('storage/' . $item->thumbnail)
                                            : asset('assets/img/default-news.png');
                                    @endphp

                                    <img src="{{ $thumbnailUrl }}" alt="{{ $item->title }}" class="card-img-top"
                                        style="max-height: 200px; object-fit: cover;">

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold text-dark">{{ $item->title }}</h5>
                                        <h6 class="card-subtitle text-muted mb-2">
                                            {{ $item->published_at ? $item->published_at->diffForHumans() : 'Belum diterbitkan' }}
                                        </h6>
                                        <p class="card-text text-muted">{{ Str::limit($item->content, 100) }}</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('information.news', $item->news_id) }}"
                                                class="btn btn-outline-danger btn-sm w-100">
                                                Baca Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <hr size="4" class="text-danger">
        </div>
    </div>
@endsection
