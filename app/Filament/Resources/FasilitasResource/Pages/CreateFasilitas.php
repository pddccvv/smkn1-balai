<?php

namespace App\Filament\Resources\FasilitasResource\Pages;

use App\Filament\Resources\FasilitasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFasilitas extends CreateRecord
{
    protected static string $resource = FasilitasResource::class;

    protected static ?string $title = 'Tambah Fasilitas';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
