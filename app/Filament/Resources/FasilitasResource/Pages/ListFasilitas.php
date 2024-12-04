<?php

namespace App\Filament\Resources\FasilitasResource\Pages;

use App\Filament\Resources\FasilitasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFasilitas extends ListRecords
{
    protected static string $resource = FasilitasResource::class;
    protected static ?string $title = 'Daftar Fasilitas';


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
