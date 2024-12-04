<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVisiMisi extends CreateRecord
{
    protected static string $resource = VisiMisiResource::class;
    protected static ?string $title = 'Tambah Visi dan Misi';

    protected function beforeSave(): void
    {
        // Hanya simpan kolom vision jika diisi
        if (!$this->record->vision) {
            $this->record->vision = null;
        }

        // Hanya simpan kolom mission jika diisi
        if (!$this->record->mission) {
            $this->record->mission = null;
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
