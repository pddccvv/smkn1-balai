<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class TotalStatisticsWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-statistics-widget';

    public function render(): \Illuminate\View\View
    {
        return view(static::$view, [
            'totalUsers' => \App\Models\User::count(),
            'totalMajors' => \App\Models\Major::count(),
            'totalExtracurriculars' => \App\Models\Extracurricular::count(),
            'totalFacility' => \App\Models\Facility::count(),
        ]);
    }
}
