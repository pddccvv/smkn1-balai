<?php

namespace App\Filament\Resources\AkreditasiResource\Pages;

use App\Filament\Resources\AkreditasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAkreditasi extends EditRecord
{
    protected static string $resource = AkreditasiResource::class;

    protected static ?string $title = 'Edit Akreditasi';


    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
