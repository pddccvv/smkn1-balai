@extends('layouts.master')

@section('title', 'Gallery | Video')

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4">ALBUM VIDEO</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 g-4">
            @foreach ($videos as $video)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded overflow-hidden">
                        <video class="card-img-top rounded-3" controls
                            style="object-fit: cover; height: 200px; cursor: pointer;">
                            <source src="{{ asset('storage/' . $video['file']) }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
