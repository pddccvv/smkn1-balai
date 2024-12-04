@extends('layouts.master')

@section('title', 'Kegiatan || Ekstrakurikuler')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/activity/extracurricular.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4">EKTRAKURIKULER</h2>
        <hr class="text-danger">

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($extracurriculars as $extracurricular)
                <div class="col">
                    <div class="card flex-row align-items-center shadow-lg border-0 p-3">
                        <img src="{{ asset('storage/' . $extracurricular->logo) }}" alt="{{ $extracurricular->name }}"
                            class="rounded-circle me-3 img-fluid" style="height: 120px; width: 120px; object-fit: cover;">

                        <div class="card-body flex-grow-1">
                            <h5 class="fw-bold text-primary">{{ $extracurricular->name }}</h5>
                            <p class="text-muted description">
                                {{ \Illuminate\Support\Str::limit($extracurricular->description, 120) }}
                            </p>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $extracurricular->id }}">
                                Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-{{ $extracurricular->id }}" tabindex="-1"
                    aria-labelledby="modalLabel-{{ $extracurricular->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalLabel-{{ $extracurricular->id }}">
                                    {{ $extracurricular->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $extracurricular->logo) }}"
                                        alt="{{ $extracurricular->name }}" class="img-fluid rounded-circle"
                                        style="height: 150px; width: 150px; object-fit: cover;">
                                </div>
                                <p class="text-muted">
                                    {{ $extracurricular->description }}
                                </p>
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
