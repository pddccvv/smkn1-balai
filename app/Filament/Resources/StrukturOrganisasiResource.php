<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Models\Organizational;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = Organizational::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationLabel = 'Struktur Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->label('Nama')
                        ->helperText('Masukkan nama'),

                    TextInput::make('nip')
                        ->required()
                        ->label('NIP')
                        ->helperText('Masukkan NIP'),

                    TextInput::make('jabatan')
                        ->required()
                        ->label('Jabatan')
                        ->helperText('Masukkan Jabatan dengan dengan Huruf Kapital diawal (contoh : Kepala Sekolah)'),
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
                    ->label('Nama'),
                TextColumn::make('nip')
                    ->sortable()
                    ->searchable()
                    ->label('NIP'),
                TextColumn::make('jabatan')
                    ->sortable()
                    ->searchable()
                    ->label('Jabatan'),
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
            'index' => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit' => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}
