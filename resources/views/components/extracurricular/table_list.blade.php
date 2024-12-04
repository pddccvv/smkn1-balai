<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Ekstrakurikuler</th>
            <th>Deskripsi</th>
            <th>Logo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($extracurriculars as $extracurricular)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $extracurricular->name }}</td>
                <td>{{ $extracurricular->description }}</td>
                <td>
                    @if ($extracurricular->logo)
                        <img src="{{ $extracurricular->logo }}" alt="Logo" width="50">
                    @else
                        <img src="/path/to/default-image.png" alt="Logo Default" width="50">
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning btn-sm"
                        onclick="showEditModal({{ $extracurricular->id }})">Edit</button>
                    <button class="btn btn-danger btn-sm"
                        onclick="showDeleteModal({{ $extracurricular->id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
