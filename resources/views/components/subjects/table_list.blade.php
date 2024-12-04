<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mata Pelajaran</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $index => $subject)
            <tr id="row-subject-{{ $subject->id }}">
                <td>{{ $index + 1 }}</td>
                <td>
                    <img src="{{ Storage::url($subject->photo) }}" alt="Foto Mata Pelajaran" width="50">
                </td>

                <td>{{ $subject->major->name }}</td>
                <td>{{ $subject->class }}</td>
                <td>{{ $subject->semester }}</td>
                <td>
                    <button class="btn btn-warning btn-edit" data-id="{{ $subject->id }}" data-bs-toggle="modal"
                        data-bs-target="#editSubjectModal">Edit</button>
                    <button class="btn btn-danger btn-delete" data-id="{{ $subject->id }}" data-bs-toggle="modal"
                        data-bs-target="#deleteSubjectModal">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
