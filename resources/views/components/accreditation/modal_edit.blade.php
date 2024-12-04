<div class="modal fade" id="editAccreditationModal" tabindex="-1" aria-labelledby="editAccreditationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccreditationModalLabel">Edit Akreditasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editAccreditationForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nama Akreditasi</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_url_certificate" class="form-label">Sertifikat</label>
                        <input type="file" class="form-control" id="edit_url_certificate" name="url_certificate"
                            accept="application/pdf,image/*">
                        <small id="edit_certificate_preview" class="form-text"></small>
                    </div>
                    <div class="mb-3">
                        <label for="edit_major_id" class="form-label">Jurusan</label>
                        <select class="form-select" id="edit_major_id" name="major_id" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
