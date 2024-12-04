<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addUserModalLabel">Form Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="addUserName" class="form-label">Nama</label>
                        <input type="text" name="name" id="addUserName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="addUserEmail" class="form-label">Email</label>
                        <input type="email" name="email" id="addUserEmail" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="addUserPassword" class="form-label">Password</label>
                        <input type="password" name="password" id="addUserPassword" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="addUserPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="addUserPasswordConfirmation"
                            class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="addUserRole" class="form-label">Role</label>
                        <select name="role" id="addUserRole" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                </form>
            </div>
        </div>
    </div>
</div>
