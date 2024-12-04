@extends('layouts.master')

@section('title', 'Profile | Akreditasi dan Informasi')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/profile/future.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bold mb-5 text-center text-uppercase">VISI MISI DAN TUJUAN</h2>
        <hr class="text-danger mb-4">
        <div class="row g-4">
            <div class="col-md-12 col-lg-4">
                <div class="card card-modern">
                    <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top">
                        <h5 class="mb-0">Visi</h5>
                    </div>
                    <div class="card-body">
                        <p class="fs-5 text-muted text-justify">{{ $futures->vision ?? 'Visi Tidak Diketahui' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="card card-modern">
                    <div class="card-header bg-gradient-info text-white text-center py-4 rounded-top">
                        <h5 class="mb-0">Misi</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach ($futures->getMission() as $index => $mission)
                                <li>
                                    <span class="icon-number">{{ $index + 1 }}</span>
                                    <i class="bi bi-check-circle text-success me-2"></i>{{ $mission }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="card card-modern">
                    <div class="card-header bg-gradient-success text-white text-center py-4 rounded-top">
                        <h5 class="mb-0">Tujuan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach ($futures->getGoals() as $index => $goal)
                                <li>
                                    <span class="icon-number">{{ $index + 1 }}</span>
                                    <i class="bi bi-check-circle text-success me-2"></i>{{ $goal }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
