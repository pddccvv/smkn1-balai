<?php

namespace App\Filament\Widgets;

use Filament\Widgets\PieChartWidget;
use App\Models\Student;
use App\Models\Major;

class StudentsChart extends PieChartWidget
{
    protected static ?string $heading = 'Distribusi Siswa';

    protected function getData(): array
    {
        // Mengambil total amount siswa berdasarkan major_id
        $studentsByMajor = Student::selectRaw('major_id, SUM(amount) as total_students')
            ->groupBy('major_id')
            ->get();

        // Mengambil data major berdasarkan major_id dari students
        $uniqueMajors = Major::whereIn('id', $studentsByMajor->pluck('major_id'))
            ->get();

        return [
            'labels' => $uniqueMajors->pluck('name')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Siswa',
                    'data' => $uniqueMajors->map(fn($major) => $studentsByMajor->firstWhere('major_id', $major->id)->total_students ?? 0)->toArray(),
                    'backgroundColor' => $uniqueMajors->map(fn() => sprintf('rgba(%d, %d, %d, 0.7)', rand(50, 255), rand(50, 255), rand(50, 255)))->toArray(),
                ],
            ],
        ];
    }
}
