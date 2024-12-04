<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($galleries as $index => $gallery)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($gallery->type == 'photo')
                        <img src="{{ Storage::url($gallery->file) }}" width="100" alt="{{ $gallery->type }}">
                    @elseif ($gallery->type == 'video')
                        <video width="100" controls>
                            <source src="{{ Storage::url($gallery->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editGallery({{ $gallery->id }})">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteGallery({{ $gallery->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
