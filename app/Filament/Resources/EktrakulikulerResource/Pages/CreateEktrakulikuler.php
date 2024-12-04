<?php

namespace App\Filament\Resources\EktrakulikulerResource\Pages;

use App\Filament\Resources\EktrakulikulerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEktrakulikuler extends CreateRecord
{
    protected static string $resource = EktrakulikulerResource::class;

    protected static ?string $title = 'Tambah Ekstrakurikuler';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
