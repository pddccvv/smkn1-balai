<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="editUserId">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama</label>
                        <input type="text" id="editName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" id="editEmail" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRole" class="form-label">Role</label>
                        <select id="editRole" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Password (optional)</label>
                        <input type="password" id="editPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" id="editPasswordConfirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Update Pengguna</button>
                </form>
            </div>
        </div>
    </div>
</div>
