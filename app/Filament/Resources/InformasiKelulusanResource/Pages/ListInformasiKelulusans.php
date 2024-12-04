<?php

namespace App\Filament\Resources\InformasiKelulusanResource\Pages;

use App\Filament\Resources\InformasiKelulusanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiKelulusans extends ListRecords
{
    protected static string $resource = InformasiKelulusanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
