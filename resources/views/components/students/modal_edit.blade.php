<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Siswa</h5>
                    <!-- Ganti data-dismiss dengan data-bs-dismiss -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">

                    <div class="form-group mb-2">
                        <label for="current-major">Jurusan saat ini:</label>
                        <p id="current-major"></p>
                    </div>

                    <div class="form-group">
                        <label for="edit-major_id">Jurusan</label>
                        <select id="edit-major_id" name="major_id" class="form-control" required>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-class">Kelas</label>
                        <select id="edit-class" name="class" class="form-control" required>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit-amount">Jumlah</label>
                        <input type="number" id="edit-amount" name="amount" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-semester">Semester</label>
                        <select id="edit-semester" name="semester" class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
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
