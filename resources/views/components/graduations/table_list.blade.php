<table class="table" id="graduationTable">
    <thead>
        <tr>
            <th>Jurusan</th>
            <th>Tahun</th>
            <th>Data</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($graduations as $graduation)
            <tr data-id="{{ $graduation->id }}">
                <td>{{ $graduation->major->name }}</td>
                <td>{{ $graduation->year }}</td>
                <td>
                    <a href="{{ Storage::url($graduation->file_path) }}" target="_blank">Lihat PDF</a>
                </td>
                <td>
                    <button class="btn btn-warning btn-edit" data-id="{{ $graduation->id }}">Edit</button>
                    <button class="btn btn-danger btn-delete" data-id="{{ $graduation->id }}">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
