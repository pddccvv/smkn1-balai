<div class="modal fade" id="editExtracurricularModal" tabindex="-1" aria-labelledby="editExtracurricularModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editExtracurricularModalLabel">Edit Ekstrakurikuler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editExtracurricularForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="editExtracurricularId">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama Ekstrakurikuler</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editLogo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="editLogo" name="logo">
                        <img id="editLogoPreview" class="mt-2" src="" alt="Logo Preview" width="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
