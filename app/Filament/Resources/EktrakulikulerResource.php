<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EktrakulikulerResource\Pages;
use App\Models\Extracurricular;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EktrakulikulerResource extends Resource
{
    protected static ?string $model = Extracurricular::class;

    protected static ?string $navigationGroup = 'Kegiatan';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Ekstrakurikuler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    TextInput::make('name')
                        ->label('Nama Ekstrakurikuler')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Textarea::make('description')
                        ->label('Deskripsi Singkat')
                        ->required(),

                    FileUpload::make('logo')
                        ->label('Logo (Opsional)')
                        ->directory('extracurricular')
                        ->helperText('Unggah File berupa Logo dari Ektrakurikuler (Maximum 80MB)')
                        ->image(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Ekstrakurikuler')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi')->limit(50),
                Tables\Columns\ImageColumn::make('logo')->label('Logo'),
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
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEktrakulikulers::route('/'),
            'create' => Pages\CreateEktrakulikuler::route('/create'),
            'edit' => Pages\EditEktrakulikuler::route('/{record}/edit'),
        ];
    }
}
