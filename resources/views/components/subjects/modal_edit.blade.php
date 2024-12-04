<div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubjectLabel">Edit Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-photo" class="form-label">Foto Mata Pelajaran</label>
                        <input type="file" name="photo" id="edit-photo" class="form-control">
                        <img id="edit-photo-preview" src="" alt="Preview Foto" class="mt-2"
                            style="max-width: 100px;">
                    </div>
                    <div class="mb-3">
                        <label for="edit-major_id" class="form-label">Jurusan</label>
                        <select name="major_id" id="edit-major_id" class="form-control" required>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-class" class="form-label">Kelas</label>
                        <select name="class" id="edit-class" class="form-control" required></select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-semester" class="form-label">Semester</label>
                        <select name="semester" id="edit-semester" class="form-control" required></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
