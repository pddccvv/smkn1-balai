<div class="mb-5">
    <h3 class="text-primary fw-bold text-center mb-4">{{ $jurusan }}</h3>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($prestasi as $prestasiItem)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <!-- Gambar Sertifikat Full Width dengan Penyesuaian Tinggi -->
                    <img src="{{ $prestasiItem['image'] }}" class="card-img-top w-100"
                        style="height: 200px; object-fit: cover;" alt="{{ $prestasiItem['title'] }}">

                    <div class="card-body">
                        <!-- Nama Lomba -->
                        <h5 class="card-title fw-bold text-center">{{ $prestasiItem['title'] }}</h5>

                        <!-- Tabel Detail Prestasi -->
                        <table class="table table-bordered mt-3">
                            <thead class="bg-danger text-white text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Bidang Lomba</th>
                                    <th>Peserta</th>
                                    <th>Juara ke-</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestasiItem['details'] as $index => $detail)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $detail['bidang_lomba'] }}</td>
                                        <td>{{ $detail['peserta'] }}</td>
                                        <td>{{ $detail['juara_ke'] }}</td>
                                        <td>{{ $detail['tahun'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
