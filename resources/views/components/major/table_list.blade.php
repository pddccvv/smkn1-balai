<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Logo</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($majors as $major)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $major->name }}</td>
                <td><img src="{{ Storage::url($major->logo) }}" width="50" alt="Logo"></td>
                <td>{{ $major->description }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="showEditModal({{ $major->id }})">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="showDeleteModal({{ $major->id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
