<?php

namespace App\Filament\Resources\KataSambutanResource\Pages;

use App\Filament\Resources\KataSambutanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKataSambutans extends ListRecords
{
    protected static string $resource = KataSambutanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
