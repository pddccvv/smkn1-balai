<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->semester }}</td>
                <td>{{ $student->amount }}</td>
                <td>
                    <button class="btn btn-primary btn-sm btn-edit" data-id="{{ $student->id }}">Edit</button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $student->id }}">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
