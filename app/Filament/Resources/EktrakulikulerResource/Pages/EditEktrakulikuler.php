<?php

namespace App\Filament\Resources\EktrakulikulerResource\Pages;

use App\Filament\Resources\EktrakulikulerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEktrakulikuler extends EditRecord
{
    protected static string $resource = EktrakulikulerResource::class;
    protected static ?string $title = 'Edit Ekstrakurikuler';

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
