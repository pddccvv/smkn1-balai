<div class="modal fade" id="newsModal{{ $item->news_id }}" tabindex="-1"
    aria-labelledby="newsModalLabel{{ $item->news_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="newsModalLabel{{ $item->news_id }}">
                    {{ $item->title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">
                    Oleh {{ $item->author }} |
                    {{ $item->published_at ? $item->published_at->format('d M Y') : 'Belum diterbitkan' }}
                </p>
                @if ($item->thumbnail)
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                        class="img-fluid mb-3 rounded">
                @endif
                <div class="content">
                    {!! nl2br(e($item->content)) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
