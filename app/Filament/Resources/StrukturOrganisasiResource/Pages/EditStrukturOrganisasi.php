<?php

namespace App\Filament\Resources\StrukturOrganisasiResource\Pages;

use App\Filament\Resources\StrukturOrganisasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStrukturOrganisasi extends EditRecord
{
    protected static string $resource = StrukturOrganisasiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
