<?php

namespace App\Filament\Widgets;

use Filament\Widgets\PieChartWidget;
use App\Models\Teacher;
use App\Models\Major;

class TeachersChart extends PieChartWidget
{
    protected static ?string $heading = 'Distribusi Guru';

    protected function getData(): array
    {
        // Menghitung jumlah guru berdasarkan major_id
        $teachersByMajor = Teacher::selectRaw('major_id, COUNT(*) as total_teachers')
            ->groupBy('major_id')
            ->get();

        // Mengambil data major berdasarkan major_id dari teachers
        $uniqueMajors = Major::whereIn('id', $teachersByMajor->pluck('major_id'))
            ->get();

        return [
            'labels' => $uniqueMajors->pluck('name')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Guru',
                    'data' => $uniqueMajors->map(fn($major) => $teachersByMajor->firstWhere('major_id', $major->id)->total_teachers ?? 0)->toArray(),
                    'backgroundColor' => $uniqueMajors->map(fn() => sprintf('rgba(%d, %d, %d, 0.7)', rand(50, 255), rand(50, 255), rand(50, 255)))->toArray(),
                ],
            ],
        ];
    }
}
