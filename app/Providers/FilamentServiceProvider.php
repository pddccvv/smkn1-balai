<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Widgets\TotalStudentWidget;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Filament\Facades\Filament;

class FilamentServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void {}
}
