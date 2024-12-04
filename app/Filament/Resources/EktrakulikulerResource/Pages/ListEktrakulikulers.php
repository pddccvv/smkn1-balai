<?php

namespace App\Filament\Resources\EktrakulikulerResource\Pages;

use App\Filament\Resources\EktrakulikulerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEktrakulikulers extends ListRecords
{
    protected static string $resource = EktrakulikulerResource::class;
    protected static ?string $title = 'Daftar Ekstrakurikuler';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
