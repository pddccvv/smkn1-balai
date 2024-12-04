@extends('layouts.master')

@section('title', 'Daftar Guru')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/information/teachers.css') }}">
@endpush

@section('content')
    <div>
        <h2 class="text-danger fw-bolder text-center mb-4">DAFTAR GURU</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        @forelse ($teachers as $jurusan => $daftarGuru)
            <div class="mt-4">
                <h5 class="fw-bold text-primary jurusan">{{ $jurusan }}</h5>
                @if ($daftarGuru->isEmpty())
                    <p class="text-muted">Tidak ada guru di jurusan ini.</p>
                @else
                    <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
                        @foreach ($daftarGuru as $teacher)
                            <div class="col">
                                <div class="card h-100 shadow-sm border rounded-3 p-3 animate__animated animate__fadeIn">
                                    <div class="d-flex align-items-center data">
                                        <img src="{{ $teacher['photo'] ? asset('storage/photos/' . $teacher['photo']) : asset('images/default-avatar.png') }}"
                                            alt="Foto {{ $teacher['name'] }}" class="rounded-circle me-3 photo-clickable"
                                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">
                                        <div>
                                            <h5 class="card-title fw-bold">{{ $teacher['name'] }}</h5>
                                            <hr class="text-danger" style="max-width: 350px">
                                            <p class="mb-1"><strong>NIP:</strong><br>{{ $teacher['nip'] }}</p>
                                            <p class="mb-1"><strong>Jenis
                                                    Kelamin:</strong><br>{{ ucwords($teacher['sex']) }}</p>
                                            <p class="mb-1"><strong>Jurusan:</strong><br>{{ $teacher['major'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <p class="text-muted">Tidak ada data guru.</p>
        @endforelse
    </div>

    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script src="{{ asset('js/user/teachers.js') }}"></script>
@endsection
