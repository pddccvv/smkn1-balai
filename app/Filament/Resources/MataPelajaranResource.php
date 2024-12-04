<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataPelajaranResource\Pages;
use App\Models\Subject;
use App\Models\Major;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;

class MataPelajaranResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationLabel = 'Mata Pelajaran';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    // TextInput::make('name')
                    //     ->required()
                    //     ->label('Nama Mata Pelajaran')
                    //     ->helperText('Masukkan nama mata pelajaran'),

                    Select::make('major_id')
                        ->label('Jurusan')
                        ->options(Major::all()->pluck('name', 'id'))
                        ->required()
                        ->helperText('Pilih jurusan untuk mata pelajaran ini'),

                    Select::make('semester')
                        ->label('Semester')
                        ->options([
                            '1' => 'Semester 1',
                            '2' => 'Semester 2',
                        ])
                        ->required()
                        ->helperText('Pilih semester untuk mata pelajaran ini'),

                    Select::make('class')
                        ->label('Kelas')
                        ->options([
                            '10' => 'Kelas 10',
                            '11' => 'Kelas 11',
                            '12' => 'Kelas 12',
                        ])
                        ->required()
                        ->helperText('Pilih kelas untuk mata pelajaran ini'),

                    FileUpload::make('photo')
                        ->label('Foto / PDF')
                        ->acceptedFileTypes(['image/*', 'application/pdf'])
                        ->required()
                        ->directory('subject')
                        ->helperText('Unggah foto atau pdf mata pelajaran (Maximum 80MB)'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('major.name')
                    ->label('Jurusan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('semester')
                    ->sortable()
                    ->label('Semester'),

                TextColumn::make('class')
                    ->sortable()
                    ->label('Kelas'),

                ImageColumn::make('photo')
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
            'index' => Pages\ListMataPelajarans::route('/'),
            'create' => Pages\CreateMataPelajaran::route('/create'),
            'edit' => Pages\EditMataPelajaran::route('/{record}/edit'),
        ];
    }
}
