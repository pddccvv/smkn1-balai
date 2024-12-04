<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSiswa extends CreateRecord
{
    protected static string $resource = SiswaResource::class;

    protected static ?string $title = 'Tambah Data Siswa';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
