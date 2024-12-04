<div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGalleryModalLabel">Tambah {{ ucfirst($type) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="galleryForm" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="type" value="{{ $type }}"> <!-- Hidden field untuk type -->

                    <div class="mb-3">
                        <label for="file" class="form-label">File {{ ucfirst($type) }}</label>
                        <input type="file" name="file[]" id="file" class="form-control" multiple required>
                    </div>

                    <div id="file-preview" class="mb-3"></div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
