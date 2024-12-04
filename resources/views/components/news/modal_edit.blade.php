<div class="modal fade" id="editModal{{ $newsItem->news_id }}" tabindex="-1" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm{{ $newsItem->news_id }}"
                    action="{{ route('admin.news.update', $newsItem->news_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $newsItem->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea name="content" id="content" rows="4" class="form-control" required>{{ $newsItem->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Penulis</label>
                        <input type="text" name="author" id="author" class="form-control"
                            value="{{ $newsItem->author }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Terbit</label>
                        <input type="date" name="published_at" id="published_at" class="form-control"
                            value="{{ $newsItem->published_at ? $newsItem->published_at->format('Y-m-d') : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
