<div class="modal fade" id="previewModal{{ $newsItem->news_id }}" tabindex="-1"
    aria-labelledby="previewModalLabel{{ $newsItem->news_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel{{ $newsItem->news_id }}">{{ $newsItem->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $newsItem->thumbnail) }}" class="img-fluid"
                    alt="{{ $newsItem->title }}">
                <h6>Penulis: {{ $newsItem->author }}</h6>
                <p>{{ $newsItem->content }}</p>
                <p><strong>Tanggal Terbit:</strong>
                    {{ $newsItem->published_at ? $newsItem->published_at->format('d M Y') : 'Belum diterbitkan' }}</p>
                <p><strong>Tanggal Edit:</strong>
                    @if ($newsItem->updated_at)
                        {{ $newsItem->updated_at->format('d M Y') }}
                    @else
                        Tidak ada update
                    @endif
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
