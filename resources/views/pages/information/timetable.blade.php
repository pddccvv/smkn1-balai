@extends('layouts.master')

@section('title', 'Informasi | Data Mata Pelajaran')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/information/subjects.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4 title">DAFTAR MATA PELAJARAN</h2>

        <hr class="text-danger">

        @include('components.error_handle')

        @foreach ($subjects->groupBy('major') as $major => $subjectGroup)
            <h6 class="text-start mb-4">{{ $major }}</h6>

            <div class="row">
                @foreach ($subjectGroup as $subject)
                    <div class="col-md-6 col-sm-6 mb-4">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-white text-center bg-danger fw-bold">
                                Kelas: {{ $subject['class'] }}
                            </div>
                            <div class="card-body text-center p-4">
                                @php
                                    $fileExtension = strtolower(
                                        pathinfo($subject['subject']->photo, PATHINFO_EXTENSION),
                                    );
                                @endphp

                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ Storage::url($subject['subject']->photo) }}" alt="Photo Preview"
                                        class="img-fluid rounded mb-3 border"
                                        style="max-height: 200px; object-fit: cover;" />
                                @elseif ($fileExtension == 'pdf')
                                    <iframe src="{{ Storage::url($subject['subject']->photo) }}" class="w-100 mb-3 rounded"
                                        style="height: 200px; border: 1px solid #ddd;"></iframe>
                                    <a href="{{ Storage::url($subject['subject']->photo) }}"
                                        class="btn btn-sm btn-primary px-4" target="_blank">📥 Download PDF</a>
                                @else
                                    <span class="text-muted">❌ No Preview Available</span>
                                @endif
                            </div>
                            <div class="card-footer subject-footer">
                                <span class="fw-bold">Semester:</span> {{ $subject['semester'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr class="text-danger">
        @endforeach
    </div>
@endsection
