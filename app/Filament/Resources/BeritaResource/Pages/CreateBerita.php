<?php

namespace App\Filament\Resources\BeritaResource\Pages;

use App\Filament\Resources\BeritaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerita extends CreateRecord
{
    protected static string $resource = BeritaResource::class;

    protected static ?string $title = 'Tambah Berita';


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
