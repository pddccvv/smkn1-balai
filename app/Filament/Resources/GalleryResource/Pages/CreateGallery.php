<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

    protected static ?string $title = 'Tambah Galeri';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
