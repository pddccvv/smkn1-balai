<?php

namespace App\Filament\Resources\JurusanResource\Pages;

use App\Filament\Resources\JurusanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJurusans extends ListRecords
{
    protected static string $resource = JurusanResource::class;

    protected static ?string $title = 'Daftar Jurusan';


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
