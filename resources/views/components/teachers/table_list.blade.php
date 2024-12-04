<table class="table table-bordered" id="table-teachers">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jurusan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $index => $teacher)
            <tr id="teacher-{{ $teacher->id }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->nip }}</td>
                <td>{{ $teacher->major->name }}</td>
                <td><img src="{{ asset('storage/' . $teacher->photo) }}" width="50" alt="Foto"></td>
                <td>
                    <button class="btn btn-primary btn-edit" data-id="{{ $teacher->id }}">Edit</button>
                    <button class="btn btn-danger btn-delete" data-id="{{ $teacher->id }}">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
