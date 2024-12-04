<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Prestasi</th>
            <th>Anggota</th>
            <th>Juara</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($achievements as $index => $achievement)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $achievement->name }}</td>
                <td>{{ $achievement->member }}</td>
                <td>{{ $achievement->champion }}</td>
                <td>{{ $achievement->year }}</td>
                <td>
                    <button class="btn btn-warning editAchievementBtn" data-id="{{ $achievement->id }}">Edit</button>

                    <button class="btn btn-danger deleteAchievementBtn" data-id="{{ $achievement->id }}">Hapus</button>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
