<?php

namespace App\Filament\Resources\InformasiKelulusanResource\Pages;

use App\Filament\Resources\InformasiKelulusanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiKelulusan extends EditRecord
{
    protected static string $resource = InformasiKelulusanResource::class;

    protected static ?string $title = 'Edit Informasi Kelulusan';


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
