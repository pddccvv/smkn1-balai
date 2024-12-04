<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiResource\Pages;
use App\Models\Achievement;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Concerns\HasHelperText;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

class PrestasiResource extends Resource
{
    protected static ?string $model = Achievement::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = 'Prestasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->label('Nama Prestasi / Lomba'),

                    TextInput::make('member')
                        ->required()
                        ->maxLength(255)
                        ->label('Anggota yang Berpartisipasi')
                        ->helperText('Masukan nama anggota yang beprestasi, jika lebih dari 2 orang pisahkan nama dengan (,)'),

                    TextInput::make('champion')
                        ->required()
                        ->maxLength(255)
                        ->label('Juara ke-'),

                    Select::make('year')
                        ->options(array_combine(range(2020, date('Y')), range(2020, date('Y'))))
                        ->required()
                        ->label('Tahun Prestasi'),

                    FileUpload::make('certificate')
                        ->label('Foto / PDF Sertifikat (Opsional)')
                        ->acceptedFileTypes(['application/pdf', 'image/*'])
                        ->helperText('Unggah Foto atau PDF Sertifikat (Maximum 80MB)')
                        ->directory('achievement'),

                    FileUpload::make('photo')
                        ->label('Foto Mahasiswa')
                        ->image()
                        ->acceptedFileTypes(['image/*'])
                        ->helperText('Unggah Foto Bersama Siswa Peserta Lomba (Maximum 80MB)')
                        ->directory('achievement')

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
                    ->label('Nama Prestasi'),

                TextColumn::make('member')
                    ->label('Anggota'),

                TextColumn::make('champion')
                    ->label('Juara'),

                TextColumn::make('year')
                    ->sortable()
                    ->label('Tahun'),

                ImageColumn::make('photo')
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
            'index' => Pages\ListPrestasis::route('/'),
            'create' => Pages\CreatePrestasi::route('/create'),
            'edit' => Pages\EditPrestasi::route('/{record}/edit'),
        ];
    }
}
