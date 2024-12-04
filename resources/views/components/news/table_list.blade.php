<div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Daftar Berita</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Penulis</th>
                    <th>Tanggal Terbit</th>
                    <th>Tanggal Edit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $item->thumbnail) }}" class="rounded" alt="{{ $item->title }}"
                                style="height: 80px; width: auto; object-fit: cover;"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->published_at ? $item->published_at->format('d M Y') : 'Belum diterbitkan' }}</td>
                        <td>
                            @if ($item->updated_at)
                                {{ $item->updated_at->format('d M Y') }}
                            @else
                                Tidak ada update
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->news_id }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                            <x-news.modal_edit :newsItem="$item" />

                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $item->news_id }}">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                            <x-news.modal_delete :newsItem="$item" />

                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#previewModal{{ $item->news_id }}">
                                <i class="bi bi-eye"></i> Preview
                            </button>
                            <x-news.modal_preview :newsItem="$item" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4">Tidak ada berita yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
