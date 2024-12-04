<?php

namespace App\Filament\Resources\InformasiKelulusanResource\Pages;

use App\Filament\Resources\InformasiKelulusanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInformasiKelulusan extends CreateRecord
{
    protected static string $resource = InformasiKelulusanResource::class;

    protected static ?string $title = 'Tambah Informasi Kelulusan';


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
