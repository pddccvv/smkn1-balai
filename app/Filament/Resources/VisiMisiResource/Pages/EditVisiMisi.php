<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisiMisi extends EditRecord
{
    protected static string $resource = VisiMisiResource::class;

    protected static ?string $title = 'Edit Visi dan Misi';


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
