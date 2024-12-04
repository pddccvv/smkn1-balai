<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationGroup = 'Gallery';

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    protected static ?string $navigationLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('type')
                        ->label('Tipe File')
                        ->options([
                            'photo' => 'Foto',
                            'video' => 'Video',
                        ])
                        ->required()
                        ->helperText('Pilih Type File terlebih dahulu sebelum menyimpan')
                        ->reactive(),

                    FileUpload::make('file')
                        ->label('File')
                        ->multiple()
                        ->directory('gallery')
                        ->required()
                        ->helperText('Unggah beberapa file foto atau video (Maximum : 80MB)')
                        ->reactive()
                        ->acceptedFileTypes(function (callable $get) {
                            return $get('type') === 'photo'
                                ? ['image/*']
                                : ($get('type') === 'video'
                                    ? ['video/*']
                                    : []);
                        }),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Tipe')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('file')
                    ->label('File')
                    ->sortable()
            ])
            ->filters([
                // Filter berdasarkan tipe file atau kriteria lainnya
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Jika ada relasi lain, tambahkan di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
