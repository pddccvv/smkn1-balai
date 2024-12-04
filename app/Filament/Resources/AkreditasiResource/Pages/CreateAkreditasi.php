<?php

namespace App\Filament\Resources\AkreditasiResource\Pages;

use App\Filament\Resources\AkreditasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAkreditasi extends CreateRecord
{
    protected static string $resource = AkreditasiResource::class;
    protected static ?string $title = 'Tambah Akreditasi';
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
