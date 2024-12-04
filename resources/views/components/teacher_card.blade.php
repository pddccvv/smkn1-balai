@props(['image', 'nama', 'nip', 'tempat_lahir', 'tanggal_lahir', 'status'])

<div class="col">
    <div class="card h-100 shadow-sm border rounded-3 p-3">
        <div class="d-flex align-items-center">
            <img src="{{ $image }}" alt="Foto {{ $nama }}" class="rounded-circle me-3"
                style="width: 80px; height: 80px; object-fit: cover;">
            <div>
                <h5 class="card-title fw-bold">{{ $nama }}</h5>
                <p class="mb-1"><strong>NIP:</strong> {{ $nip }}</p>
                <p class="mb-1"><strong>Tempat, Tanggal Lahir:</strong> {{ $tempat_lahir }}, {{ $tanggal_lahir }}</p>
                <p class="mb-0"><strong>Status:</strong> {{ $status }}</p>
            </div>
        </div>
    </div>
</div>
