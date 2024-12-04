@extends('layouts.master')

@section('title', 'Informasi | Berita')

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4 title">BERITA</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        @if ($news->isEmpty())
            <div class="alert alert-warning">Tidak ada berita yang tersedia.</div>
        @else
            @php
                $groupedNews = $news->groupBy(fn($item) => \Carbon\Carbon::parse($item->published_at)->format('W-Y'));
            @endphp

            @foreach ($groupedNews as $week => $items)
                @php
                    [$weekNumber, $year] = explode('-', $week);
                @endphp

                <h4 class="mt-4">Minggu ke-{{ $weekNumber }} Tahun {{ $year }}</h4>
                <div class="row g-3">
                    @foreach ($items as $item)
                        @include('partials.news.news_card', ['item' => $item])
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
@endsection
