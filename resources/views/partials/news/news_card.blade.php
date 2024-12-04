<div class="col-6 col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm">
        @php
            $thumbnailPath = public_path('storage/' . $item->thumbnail);
        @endphp

        <img src="{{ file_exists($thumbnailPath) ? asset('storage/' . $item->thumbnail) : asset('assets/img/default-news.png') }}"
            alt="{{ $item->title }}" class="card-img-top" style="max-height: 200px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title text-danger">{{ $item->title }}</h5>
            <p class="text-muted mb-2">
                Oleh {{ $item->author }} |
                {{ $item->published_at ? $item->published_at->format('d M Y') : 'Belum diterbitkan' }}
            </p>
            <p class="card-text mb-3">{{ Str::limit($item->content, 100) }}</p>
            <div class="mt-auto">
                <button class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                    data-bs-target="#newsModal{{ $item->news_id }}">
                    Lihat Selengkapnya
                </button>
            </div>
        </div>
    </div>

    @include('partials.news.news_modal', ['item' => $item])
</div>
