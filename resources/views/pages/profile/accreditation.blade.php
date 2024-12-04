@extends('layouts.master')

@section('title', 'Profile | Akreditasi dan Informasi')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/profile/accreditation.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-primary fw-bold mb-4 text-center text-uppercase">Akreditasi dan Informasi</h2>
        <hr class="text-danger mb-4">

        <div class="mb-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top">
                    <h4 class="mb-0 text-uppercase fw-bold">Sertifikat Sekolah</h4>
                </div>
                <div class="card-body text-center">
                    <div class="icon-container mb-4">
                        <i class="bi bi-file-earmark-pdf-fill text-danger" style="font-size: 4rem;"></i>
                    </div>
                    <p class="text-muted mb-3">
                        Sertifikat akreditasi sekolah SMK N 1 Balai untuk seluruh program keahlian.
                    </p>
                    <a href="#" class="btn btn-lg btn-gradient-primary text-white px-4 py-2" download>
                        <i class="bi bi-download me-2"></i> Download Sertifikat Sekolah
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($accreditations as $accreditation)
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-header bg-gradient-secondary text-white text-center py-3">
                            <h5 class="mb-0 fw-bold">{{ $accreditation->major->name ?? 'Jurusan Tidak Diketahui' }}</h5>
                        </div>
                        <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                            @if (pathinfo($accreditation->certificate, PATHINFO_EXTENSION) === 'pdf')
                                <div class="mb-4">
                                    <i class="bi bi-file-earmark-pdf-fill text-danger" style="font-size: 3rem;"></i>
                                    <p class="mt-2 text-muted">Sertifikat dalam format PDF</p>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $accreditation->certificate) }}"
                                    class="img-fluid rounded shadow mb-3"
                                    alt="Sertifikat {{ $accreditation->major->name }}">
                            @endif
                            <p class="text-muted mb-4">
                                Sertifikat akreditasi untuk jurusan {{ $accreditation->major->name ?? 'Tidak Diketahui' }}.
                            </p>
                            <a href="{{ asset('storage/' . $accreditation->certificate) }}"
                                class="btn btn-gradient-secondary text-white px-4 py-2" download>
                                <i class="bi bi-download me-2"></i> Download Sertifikat
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-warning text-center">
                        <strong>Informasi:</strong> Sertifikat akreditasi untuk jurusan belum tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
