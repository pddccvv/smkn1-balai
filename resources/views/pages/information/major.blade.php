@extends('layouts.master')

@section('title', 'Information | Daftar Jurusan')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/information/major.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4 animate__animated animate__fadeIn">DAFTAR JURUSAN</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        <div class="row g-4">
            @foreach ($majors as $index => $major)
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 d-flex animate__animated animate__fadeInUp"
                        style="transition: transform 0.3s ease; height: 100%;">
                        <div class="col-md-4 col-12 d-flex align-items-center" style="height: 200px;">
                            @if ($major->logo)
                                <img src="{{ asset('storage/' . $major->logo) }}" alt="Logo {{ $major->name }}"
                                    class="img-fluid rounded" style="height: 100%; width: auto; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Logo default"
                                    class="img-fluid rounded" style="height: 100%; width: auto; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="card-body d-flex flex-column" style="height: 100%;">
                                <h5 class="card-title fw-bold text-primary">{{ $major->name }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($major->description, 150) }}</p>
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $major->id }}">
                                    Lihat Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-{{ $major->id }}" tabindex="-1"
                    aria-labelledby="modalLabel-{{ $major->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalLabel-{{ $major->id }}">{{ $major->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    @if ($major->logo)
                                        <img src="{{ asset('storage/' . $major->logo) }}" alt="Logo {{ $major->name }}"
                                            class="img-fluid rounded"
                                            style="max-height: 90px; width: auto; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/default-avatar.png') }}" alt="Logo default"
                                            class="img-fluid rounded"
                                            style="max-height: 90px; width: auto; object-fit: cover;">
                                    @endif
                                </div>
                                <p class="text-muted">{{ $major->description }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
