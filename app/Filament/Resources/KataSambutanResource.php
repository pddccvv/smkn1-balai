<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KataSambutanResource\Pages;
use App\Models\Welcome;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class KataSambutanResource extends Resource
{
    protected static ?string $model = Welcome::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationLabel = 'Kata Sambutan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Textarea::make('words')
                        ->label('Kata Sambutan')
                        ->autofocus()
                        ->helperText('Tulis Kata Sambutan Disini!')
                        ->unique(ignorable: fn($record) => $record),

                    TextInput::make('nip')
                        ->label('NIP Kepala Sekolah')
                        ->autofocus()
                        ->minValue(10)
                        ->numeric()
                        ->helperText('Tulis NIP Kepala Sekolah (Angka saja)')
                        ->unique(ignorable: fn($record) => $record),

                    TextInput::make('headmaster')
                        ->label('Nama Kepala Sekolah')
                        ->autofocus()
                        ->helperText('Tulis Kata Sambutan Disini!')
                        ->unique(ignorable: fn($record) => $record),

                    FileUpload::make('photo')
                        ->image()
                        ->label('Photo Kepala Sekolah')
                        ->helperText('Upload foto kepala sekolah (Maximum 80MB)')
                        ->directory('welcome'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('words'),

                TextColumn::make('nip'),

                TextColumn::make('headmaster'),

                ImageColumn::make('photo')
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKataSambutans::route('/'),
            'create' => Pages\CreateKataSambutan::route('/create'),
            'edit' => Pages\EditKataSambutan::route('/{record}/edit'),
        ];
    }
}
