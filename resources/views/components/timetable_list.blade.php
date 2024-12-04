@props(['jurusan', 'dataPelajaran'])

<div class="jurusan-section mb-5 p-4 shadow-sm border rounded">
    <h4 class="text-primary fw-bold text-uppercase border-bottom pb-2 mb-4">{{ $jurusan }}</h3>
        <div class="row">
            @foreach ($dataPelajaran as $kelas => $semesterData)
                <div class="col-md-4 mb-4">
                    <div class="kelas-card p-3 border rounded bg-light shadow-sm">
                        <h4 class="text-center text-secondary">Kelas {{ $kelas }}</h4>
                        <div class="d-flex justify-content-between mt-3">
                            @foreach ($semesterData as $semester => $pelajaran)
                                <div class="semester-card p-2 mx-1 flex-fill border rounded bg-white shadow-sm">
                                    <h5 class="text-center text-info">Semester {{ $semester }}</h5>
                                    <ul class="list-unstyled mt-2">
                                        @foreach ($pelajaran as $mapel)
                                            <li class="text-muted">{{ $mapel }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
