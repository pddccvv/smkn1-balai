@extends('layouts.master')

@section('title', 'Sambutan Kepala Sekolah')

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bold text-center mb-4">SAMBUTAN KEPALA SEKOLAH</h2>
        <hr class="text-danger mb-4">

        <div class="row align-items-center">
            @if ($welcomes->isNotEmpty())
                @foreach ($welcomes as $item)
                    <div class="col-lg-8 col-md-12 mb-4">
                        <p class="text-justify lh-lg mb-5" style="text-align: justify; text-indent: 30px;">
                            {!! nl2br(e($item->words)) !!}
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4 text-center">
                        @if ($item->photo)
                            <img src="{{ asset('storage/welcome/' . $item->photo) }}" class="img-fluid rounded shadow-lg mb-3"
                                alt="Foto Kepala Sekolah">
                        @else
                            <img src="{{ asset('assets/img/default-photos.png') }}" class="img-fluid rounded shadow-lg mb-3"
                                alt="Foto Default Kepala Sekolah">
                        @endif
                        <div class="mt-3">
                            <h5 class="fw-bold">{{ $item->headmaster }}</h5>
                            <p class="text-muted">NIP: {{ $item->nip }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-danger">Data sambutan kepala sekolah tidak tersedia.</p>
            @endif
        </div>
    </div>
@endsection
