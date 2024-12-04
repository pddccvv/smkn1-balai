<?php

namespace App\Filament\Resources\KontakResource\Pages;

use App\Filament\Resources\KontakResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKontaks extends ListRecords
{
    protected static string $resource = KontakResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
