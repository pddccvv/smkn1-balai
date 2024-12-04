<?php

namespace App\Filament\Resources\AkreditasiResource\Pages;

use App\Filament\Resources\AkreditasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAkreditasis extends ListRecords
{
    protected static string $resource = AkreditasiResource::class;

    protected static ?string $title = 'Daftar Akreditasi';


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
