<?php

namespace App\Filament\Resources\MataPelajaranResource\Pages;

use App\Filament\Resources\MataPelajaranResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMataPelajaran extends CreateRecord
{
    protected static string $resource = MataPelajaranResource::class;
    protected static ?string $title = 'Tambah Mata Pelajaran';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
