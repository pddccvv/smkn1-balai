@extends('layouts.master')

@section('title', 'Gallery | Photo')

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4">ALBUM PHOTO</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($photos as $photo)
                @php
                    $sanitizedFileName = preg_replace(
                        '/[^a-zA-Z0-9_]/',
                        '_',
                        pathinfo($photo['file'], PATHINFO_FILENAME),
                    );
                @endphp
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded overflow-hidden">
                        <img src="{{ asset('storage/' . $photo['file']) }}" class="card-img-top rounded-3" alt="Photo"
                            style="object-fit: cover; height: 200px; cursor: pointer;" data-bs-toggle="modal"
                            data-bs-target="#photoModal{{ $sanitizedFileName }}">
                    </div>
                </div>

                <!-- Modal for viewing enlarged photo based on sanitized file name -->
                <div class="modal fade" id="photoModal{{ $sanitizedFileName }}" tabindex="-1"
                    aria-labelledby="photoModalLabel{{ $sanitizedFileName }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $photo['file']) }}" class="img-fluid rounded"
                                    alt="Photo">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
