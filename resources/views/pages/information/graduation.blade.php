@extends('layouts.master')

@section('title', 'Informasi | Data Kelulusan')

@section('content')
    <div class="container">
        <h2 class="text-danger text-center fw-bolder mb-4">PENGUMUMAN KELULUSAN</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        @if ($graduations->isEmpty())
            <div class="alert alert-warning text-center">Tidak ada pengumuman kelulusan yang tersedia.</div>
        @else
            <div class="row g-4">
                @foreach ($graduations->groupBy('major') as $major => $groupedGraduations)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card shadow-sm border-danger rounded h-100">
                            <div class="card-header text-center bg-danger text-white">
                                <h5 class="card-title mb-0">{{ $major }}</h5>
                            </div>
                            <div class="card-body d-flex flex-column">
                                @foreach ($groupedGraduations as $graduation)
                                    <div class="graduation-entry mb-3 flex-grow-1">
                                        <h6 class="fw-bold">{{ $graduation['year'] }}</h6>
                                        <p class="text-muted mb-1">Daftar kelulusan:</p>
                                        <a href="{{ $graduation['pdf_url'] }}" class="btn btn-outline-danger btn-sm"
                                            target="_blank">
                                            Download PDF
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
