<div class="mb-5">
    <h3 class="text-primary fw-bold text-center mb-4">{{ $jurusan }}</h3>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($fasilitas as $fasilitasItem)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $fasilitasItem['image'] }}" class="card-img-top" alt="{{ $fasilitasItem['name'] }}">

                    <div class="card-body text-center text-light" style="background-color: red;">
                        <h5 class="card-title fw-bold">{{ $fasilitasItem['name'] }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
