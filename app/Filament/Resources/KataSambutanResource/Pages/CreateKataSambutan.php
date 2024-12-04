<?php

namespace App\Filament\Resources\KataSambutanResource\Pages;

use App\Filament\Resources\KataSambutanResource;
use App\Models\Welcome;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKataSambutan extends CreateRecord
{
    protected static string $resource = KataSambutanResource::class;

    protected static ?string $title = 'Tambah Kata Sambutan';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (Welcome::exists()) {
            $this->notify('danger', 'Hanya diperbolehkan satu data! Silakan edit data yang sudah ada.');
            abort(403, 'Hanya diperbolehkan satu data! Silakan edit data yang sudah ada.');
        }

        return $data;
    }

    public static function canCreate(): bool
    {
        return !Welcome::exists();
    }
}