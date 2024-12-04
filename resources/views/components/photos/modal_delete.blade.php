<div class="modal fade" id="deletePhotoModal" tabindex="-1" aria-labelledby="deletePhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePhotoModalLabel">Hapus Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deletePhotoForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deletePhotoId">
                    <input type="hidden" id="type" value="{{ $type }}">
                    <p>Apakah Anda yakin ingin menghapus foto ini?</p>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
