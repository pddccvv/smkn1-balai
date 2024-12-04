<?php

namespace App\Filament\Resources\KataSambutanResource\Pages;

use App\Filament\Resources\KataSambutanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKataSambutan extends EditRecord
{
    protected static string $resource = KataSambutanResource::class;

    protected static ?string $title = 'Edit Kata Sambutan';

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
