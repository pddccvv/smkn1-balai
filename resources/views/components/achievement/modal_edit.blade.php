<div class="modal fade" id="editAchievementModal" tabindex="-1" aria-labelledby="editAchievementModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAchievementModalLabel">Edit Prestasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAchievementForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nama Prestasi</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_member" class="form-label">Member</label>
                        <textarea class="form-control" id="edit_member" name="member" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit_champion" class="form-label">Juara</label>
                        <input type="text" class="form-control" id="edit_champion" name="champion" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_year" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="edit_year" name="year" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit_certificate" class="form-label">Sertifikat (Opsional)</label>
                        <input type="file" class="form-control" id="edit_certificate" name="certificate">
                        <p id="edit_certificate_preview"></p>
                    </div>

                    <div class="mb-3">
                        <label for="edit_photo" class="form-label">Foto (Opsional)</label>
                        <input type="file" class="form-control" id="edit_photo" name="photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
