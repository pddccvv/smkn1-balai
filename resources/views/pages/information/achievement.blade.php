@extends('layouts.master')

@section('title', 'Prestasi | Daftar Prestasi Jurusan')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/information/achievements.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4 animate__animated animate__fadeIn">DAFTAR PRESTASI</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        <div class="achievements-container">
            @foreach ($achievements as $achievement)
                <div class="card animate__animated animate__fadeInUp">
                    <div class="card-header">
                        {{ $achievement->name }}
                    </div>
                    <div class="card-body">
                        <p><strong>Anggota:</strong></p>
                        <ul class="list-unstyled member-list">
                            @foreach (explode(',', $achievement->member) as $member)
                                <li>{{ $member }}</li>
                            @endforeach
                        </ul>

                        <p><strong>Juara:</strong> {{ $achievement->champion }}</p>
                        <p><strong>Tahun:</strong> {{ $achievement->year }}</p>

                        @if ($achievement->photo)
                            <div class="d-flex justify-content-center">
                                <img src="{{ Storage::url($achievement->photo) }}" alt="Prestasi Photo"
                                    class="img-thumbnail">
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
