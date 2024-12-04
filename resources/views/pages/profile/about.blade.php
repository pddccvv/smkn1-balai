@extends('layouts.master')

@section('title', 'Tentang SMK Negeri 1 Balai - Batang Tarang')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/profile/about.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bold text-center mb-4">Tentang SMK Negeri 1 Balai - Batang Tarang</h2>
        <hr class="text-danger mb-4">

        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-lg">
                    <img src="{{ asset('assets/img/taman-smk.jpeg') }}" class="card-img-top rounded-3" alt="Taman SMK">
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-lg p-4">
                    <p class="text-justify lh-lg mb-3">
                        SMK Negeri 1 Balai berdiri pada tahun 2010 sebagai satu-satunya sekolah kejuruan di Kecamatan Balai
                        Batang Tarang. Sekolah ini didirikan untuk memenuhi kebutuhan pendidikan kejuruan bagi lulusan SMP
                        yang belum terserap di SMA, dengan bantuan Direktorat Pembinaan SMK.
                    </p>
                    <p class="text-justify lh-lg mb-4">
                        Awalnya hanya memiliki satu bidang keahlian, kini SMK Negeri 1 Balai telah berkembang menjadi empat
                        bidang keahlian:
                    </p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-seedling me-3 text-success" style="font-size: 24px;"></i>
                                <div>
                                    <strong class="text-danger">Agribisnis dan Agroteknologi</strong>
                                    <div>(Agribisnis Tanaman Perkebunan)</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-laptop-code me-3 text-primary" style="font-size: 24px;"></i>
                                <div>
                                    <strong class="text-danger">Teknik Informasi dan Komunikasi</strong>
                                    <div>(Teknik Komputer dan Jaringan)</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calculator me-3 text-warning" style="font-size: 24px;"></i>
                                <div>
                                    <strong class="text-danger">Bisnis dan Manajemen</strong>
                                    <div>(Akuntansi dan Keuangan Lembaga)</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-motorcycle me-3 text-danger" style="font-size: 24px;"></i>
                                <div>
                                    <strong class="text-danger">Teknologi dan Rekayasa</strong>
                                    <div>(Teknik Bisnis Sepeda Motor)</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-lg mt-5">
            <div class="card-body">
                <p class="card-text text-justify lh-lg">
                    Pembangunan sekolah dimulai pada 18 Juni 2010 dengan dana pusat dan APBD Kabupaten Sanggau.
                    Pembangunan ini melibatkan banyak pihak, di antaranya:
                </p>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>Bapak Saparman (Almh)</strong> - Kepala Desa Hilir saat itu.</li>
                    <li class="list-group-item"><strong>Bapak Drs. Franciskus Marinus MM</strong> - Camat Balai.</li>
                    <li class="list-group-item"><strong>Bapak Sali</strong> - Anggota Dewan Dapil IV.</li>
                    <li class="list-group-item">
                        <strong>Tokoh masyarakat dan perintis:</strong> <br>
                        <ol class="pl-3">
                            <li>Pak Alot</li>
                            <li>Pendeta Kasman</li>
                            <li>Junaidi</li>
                            <li>Kim Swan</li>
                            <li>Paulus Taher</li>
                            <li>Pokol</li>
                            <li>Yohanes Minggu</li>
                        </ol>
                    </li>

                </ul>
                <p class="card-text text-justify lh-lg">
                    SMK Negeri 1 Balai menerima siswa pertama kali pada Juli 2011 dengan 32 siswa. Pada 8 Maret 2012,
                    sekolah ini diresmikan oleh Wakil Bupati Sanggau, <strong>Paolus Hadi, S.IP</strong>, dengan dukungan
                    masyarakat
                    dan instansi terkait.
                </p>
            </div>
        </div>
    </div>
@endsection
