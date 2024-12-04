<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Models\Future;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;



class VisiMisiResource extends Resource
{
    protected static ?string $model = Future::class;

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'Visi dan Misi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Textarea::make('vision')
                        ->label('Visi')
                        ->helperText('Tambahkan poin dari visi untuk poin ke-2 dan seterusnya di pisah tanda (,)')
                        ->nullable(),

                    Textarea::make('mission')
                        ->label('Misi')
                        ->nullable(),

                    Textarea::make('goals')
                        ->label('Tujuan')
                        ->helperText('Tambahkan poin dari tujuan untuk poin ke-2 dan seterusnya di pisah tanda (,)')
                        ->nullable(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vision'),
                TextColumn::make('mission'),
                TextColumn::make('goals')
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
