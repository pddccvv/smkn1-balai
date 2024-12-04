<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

    protected static ?string $title = 'Daftar Galeri';


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
