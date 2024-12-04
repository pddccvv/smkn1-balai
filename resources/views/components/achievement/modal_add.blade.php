<div class="modal fade" id="addAchievementModal" tabindex="-1" aria-labelledby="addAchievementModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addAchievementForm">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="addAchievementModalLabel">Tambah Prestasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Prestasi</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="member" class="form-label">Anggota</label>
                        <input type="text" class="form-control" id="member" name="member">
                    </div>
                    <div class="mb-3">
                        <label for="champion" class="form-label">Juara</label>
                        <input type="text" class="form-control" id="champion" name="champion" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label for="certificate" class="form-label">Sertifikat (PDF)</label>
                        <input type="file" class="form-control" id="certificate" name="certificate" accept=".pdf">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto (Gambar)</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
