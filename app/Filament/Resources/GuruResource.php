<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Teacher;
use App\Models\Major;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class GuruResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationLabel = 'Guru';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->label('Nama Guru')
                        ->helperText('Masukkan nama guru'),

                    Select::make('sex')
                        ->label('Jenis Kelamin')
                        ->options([
                            'Laki-Laki' => 'Laki-Laki',
                            'Perempuan' => 'Perempuan'
                        ]),

                    TextInput::make('nip')
                        ->required()
                        ->label('NIP')
                        ->helperText('Masukkan NIP guru')
                        ->numeric(),

                    Select::make('major_id')
                        ->label('Jurusan')
                        ->options(Major::all()->pluck('name', 'id'))
                        ->required()
                        ->helperText('Pilih jurusan untuk guru ini'),

                    FileUpload::make('photo')
                        ->image()
                        ->label('Foto Guru')
                        ->directory('teacher')
                        ->helperText('Unggah foto guru (Maximum 80MB')
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
                    ->label('Nama Guru'),

                TextColumn::make('nip')
                    ->sortable()
                    ->label('NIP'),

                TextColumn::make('major.name')
                    ->label('Jurusan')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                // Filter jika diperlukan
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
