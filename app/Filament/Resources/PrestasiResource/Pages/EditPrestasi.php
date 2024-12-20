<?php

namespace App\Filament\Resources\PrestasiResource\Pages;

use App\Filament\Resources\PrestasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrestasi extends EditRecord
{
    protected static string $resource = PrestasiResource::class;

    protected static ?string $title = 'Edit Prestasi';


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
