<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Models\Facility;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class FasilitasResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Fasilitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->label('Nama Fasilitas')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Masukan Nama fasilitas'),

                    Textarea::make('description')
                        ->label(('Deskripsi Fasilitas'))
                        ->required()
                        ->helperText('Masukan Deskripsi Dari fasilitas'),

                    FileUpload::make('photo_path')
                        ->label('Foto Fasilitas')
                        ->image()
                        ->required()
                        ->directory('facility')
                        ->helperText('Unggah Foto Fasilitas (Maximum 80MB)'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Fasilitas'),

                TextColumn::make('description')
                    ->sortable()
                    ->label('Deskripsi'),

                ImageColumn::make('photo_path')
                    ->label('Foto'),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
