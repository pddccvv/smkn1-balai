@extends('layouts.master')

@section('title', 'Informasi | Data Jumlah Siswa')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/information/students.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bold text-center mb-4">DATA JUMLAH SISWA</h2>

        <hr class="text-danger">

        @include('components.error_handle')

        <div class="mb-5">
            <canvas id="studentChart" style="width:100%;max-width:600px"></canvas>
        </div>

        <div>
            <table class="table table-striped table-hover table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th rowspan="2" class="align-middle">Nama Jurusan</th>
                        <th colspan="3">Kelas</th>
                        <th rowspan="2" class="align-middle">Total</th>
                    </tr>
                    <tr>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>
                                {{ $student['major'] }}
                            </td>
                            <td>{{ $student['class_counts']['10'] }}</td>
                            <td>{{ $student['class_counts']['11'] }}</td>
                            <td>{{ $student['class_counts']['12'] }}</td>
                            <td>{{ $student['total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script>
            var majors = @json(array_keys($students));
            var studentCounts = @json(array_column($students, 'total'));
        </script>
        <script src="{{ asset('js/user/students.js') }}"></script>
    @endpush
@endsection
