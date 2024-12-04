<div class="table-responsive mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->description }}</td>
                    <td>
                        @if ($facility->photo_path)
                            <img src="{{ Storage::url($facility->photo_path) }}" width="50" alt="Foto Fasilitas">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="showEditModal({{ $facility->id }})">Edit</button>
                        <button class="btn btn-danger btn-sm"
                            onclick="showDeleteModal({{ $facility->id }})">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
