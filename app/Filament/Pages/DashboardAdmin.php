<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StudentsChart;
use App\Filament\Widgets\TeachersChart;
use App\Filament\Widgets\TotalStatisticsWidget;
use App\Models\{User, Major, Extracurricular, Facility, Student};
use Filament\Pages\Dashboard;

class DashboardAdmin extends Dashboard
{
    protected static ?string $navigationLabel = 'Dashboard Admin';
    protected static ?string $title = 'Dashboard Admin';

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public array $studentsPerClassSemester = [];

    public function mount(): void
    {

        $this->studentsPerClassSemester = Student::select('class', 'semester')
            ->selectRaw('SUM(amount) as total') // Using SUM to get total students
            ->groupBy('class', 'semester')
            ->orderBy('class')
            ->orderBy('semester')
            ->get()
            ->groupBy('class') // Grouping by class
            ->map(fn($group) => $group->keyBy('semester')->map->total)
            ->toArray();
    }

    protected function getWidgets(): array
    {
        return [
            TotalStatisticsWidget::class,
            TeachersChart::class,
            StudentsChart::class,
        ];
    }
}
