<?php

namespace App\Filament\Resources\MataPelajaranResource\Pages;

use App\Filament\Resources\MataPelajaranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMataPelajarans extends ListRecords
{
    protected static string $resource = MataPelajaranResource::class;

    protected static ?string $title = 'Daftar Mata Pelajaran';


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
