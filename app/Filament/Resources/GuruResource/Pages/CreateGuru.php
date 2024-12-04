<?php

namespace App\Filament\Resources\GuruResource\Pages;

use App\Filament\Resources\GuruResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGuru extends CreateRecord
{
    protected static string $resource = GuruResource::class;

    protected static ?string $title = 'Tambah Data Guru';


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
