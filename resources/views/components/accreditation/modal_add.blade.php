<div class="modal fade" id="addAccreditationModal" tabindex="-1" aria-labelledby="addAccreditationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccreditationModalLabel">Tambah Akreditasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addAccreditationForm" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Akreditasi</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_certificate" class="form-label">Sertifikat</label>
                        <input type="file" class="form-control" id="url_certificate" name="url_certificate"
                            accept="application/pdf,image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="major_id" class="form-label">Jurusan</label>
                        <select class="form-select" id="major_id" name="major_id" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
