<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Student;
use App\Models\Major;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;

class SiswaResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationLabel = 'Data Siswa';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('major_id')
                        ->label('Jurusan')
                        ->options(Major::all()->pluck('name', 'id'))
                        ->required()
                        ->helperText('Pilih jurusan'),

                    Select::make('class')
                        ->label('Kelas')
                        ->options([
                            '10' => 'Kelas 10',
                            '11' => 'Kelas 11',
                            '12' => 'Kelas 12'
                        ])
                        ->required()
                        ->helperText('Pilih kelas'),

                    Select::make('semester')
                        ->label('Semester')
                        ->options([
                            '1' => 'Semester 1',
                            '2' => 'Semester 2'
                        ])
                        ->required()
                        ->helperText('Pilih semester'),

                    TextInput::make('amount')
                        ->required()
                        ->numeric()
                        ->label('Jumlah Siswa')
                        ->helperText('Masukkan jumlah siswa di kelas'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('class')
                    ->sortable()
                    ->searchable()
                    ->label('Kelas'),

                TextColumn::make('amount')
                    ->sortable()
                    ->label('Jumlah Siswa'),

                TextColumn::make('major.name')
                    ->label('Jurusan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('semester')
                    ->sortable()
                    ->label('Semester'),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
