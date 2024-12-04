<div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addNewsModalLabel">Form Tambah Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewsForm" action="{{ route('admin.addnews') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Penulis</label>
                        <input type="text" name="author" id="author" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Terbit</label>
                        <input type="date" name="published_at" id="published_at" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Berita</button>
                </form>
            </div>
        </div>
    </div>
</div>
