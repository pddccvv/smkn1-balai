<table class="table table-striped" id="userTable">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <button class="btn btn-warning" onclick="showEditModal({{ $user->id }})">Edit</button>
                    <button class="btn btn-danger" onclick="showDeleteModal({{ $user->id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
