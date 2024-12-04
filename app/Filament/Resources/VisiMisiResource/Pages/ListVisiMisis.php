<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisiMisis extends ListRecords
{
    protected static string $resource = VisiMisiResource::class;

    protected static ?string $title = 'Daftar Visi dan Misi';


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
