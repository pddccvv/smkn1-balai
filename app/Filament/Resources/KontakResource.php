<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Models\Contact;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class KontakResource extends Resource
{
    protected static ?string $navigationGroup = 'Kontak';

    protected static ?string $navigationLabel = 'Kelola Kontak';

    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('instagram')
                        ->required()
                        ->label('Instagram')
                        ->helperText('Masukkan Link Instagram'),

                    Select::make('facebook')
                        ->label('Facebook')
                        ->required()
                        ->helperText('Masukkan Link Facebook'),

                    TextInput::make('mail')
                        ->required()
                        ->label('EMAIL')
                        ->helperText('Masukkan Email Address'),

                    TextInput::make('whatsappp')
                        ->required()
                        ->label('WhatsApp')
                        ->helperText('Masukkan Nomer Whatsapp')
                        ->numeric(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('instagram')
                    ->sortable()
                    ->searchable()
                    ->label('Instagram'),
                TextColumn::make('facebook')
                    ->sortable()
                    ->searchable()
                    ->label('Facebook'),
                TextColumn::make('whatsapp')
                    ->sortable()
                    ->searchable()
                    ->label('WhatsApp'),
                TextColumn::make('mail')
                    ->sortable()
                    ->searchable()
                    ->label('Email'),
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
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
