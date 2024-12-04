<table class="table table-bordered" id="accreditationTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Akreditasi</th>
            <th>URL Sertifikat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accreditations as $index => $accreditation)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $accreditation->name }}</td>
                <td>
                    <a href="{{ Storage::url($accreditation->url_certificate) }}" target="_blank">Lihat Sertifikat</a>
                </td>
                <td>{{ $accreditation->major->name }}</td>
                <td>
                    <button class="btn btn-warning btn-sm editAccreditationBtn" data-id="{{ $accreditation->id }}"
                        data-bs-toggle="modal" data-bs-target="#editAccreditationModal">Edit</button>
                    <button class="btn btn-danger btn-sm deleteAccreditationBtn" data-id="{{ $accreditation->id }}"
                        data-bs-toggle="modal" data-bs-target="#deleteAccreditationModal">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
