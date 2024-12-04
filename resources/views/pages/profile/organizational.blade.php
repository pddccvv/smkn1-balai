@extends('layouts.master')

@section('title', 'Profile | Struktur Organisasi')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/profile/organizational.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bold mb-4 text-center">STRUKTUR ORGANISASI</h2>
        <hr class="text-danger mb-4">

        <div class="mt-5">
            <h4 class="text-danger mb-3">Struktur Organisasi (Alternatif)</h4>
            @foreach ($groupedOrganizationals as $jabatan => $anggotaGroup)
                <div class="mb-4">
                    <h5 class="text-primary text-uppercase fw-semibold mb-2">{{ $jabatan }}</h5>
                    <div class="d-flex flex-wrap justify-content-start gap-3">
                        @foreach ($anggotaGroup as $anggota)
                            <div class="card text-center shadow-sm p-2" style="width: 120px;">
                                <div class="card-body p-1">
                                    <h6 class="card-title text-truncate text-dark fw-bold mb-0"
                                        title="{{ $anggota->name }}">
                                        {{ $anggota->name }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5">
            <h4 class="text-danger mb-3">Struktur Organisasi (Tabel)</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA</th>
                            <th class="text-center">JABATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($organizationals as $anggota)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $anggota->name }}</td>
                                <td>{{ $anggota->jabatan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
