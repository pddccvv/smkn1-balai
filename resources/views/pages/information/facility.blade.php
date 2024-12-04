@extends('layouts.master')

@section('title', 'Fasilitas | Daftar Fasilitas')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/information/facility.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4 animate__animated animate__fadeIn">DAFTAR FASILITAS</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        <div class="row">
            @foreach ($facilities as $facility)
                <div class="col-md-4 mb-4">
                    <div class="card facility-card">
                        @if ($facility->photo_path)
                            <img src="{{ asset('storage/' . $facility->photo_path) }}" alt="{{ $facility->name }}"
                                class="card-img-top facility-image" style="max-height: 200px; object-fit: cover;"
                                data-bs-toggle="modal" data-bs-target="#facilityModal-{{ $facility->id }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $facility->name }}</h5>
                            <p class="card-text">{{ Str::limit($facility->description, 100) }}</p>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="facilityModal-{{ $facility->id }}" tabindex="-1"
                    aria-labelledby="facilityModalLabel-{{ $facility->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="facilityModalLabel-{{ $facility->id }}">{{ $facility->name }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/' . $facility->photo_path) }}" alt="{{ $facility->name }}"
                                    class="img-fluid" style="max-height: 600px; object-fit: contain;">
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
