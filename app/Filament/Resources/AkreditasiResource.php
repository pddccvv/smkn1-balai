<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AkreditasiResource\Pages;
use App\Models\Accreditation;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class AkreditasiResource extends Resource
{
    protected static ?string $model = Accreditation::class;

    protected static ?string $navigationGroup = 'Profil';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-check';

    protected static ?string $navigationLabel = 'Akreditasi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Akreditasi')
                    ->required(),

                FileUpload::make('certificate')
                    ->label('sertifikat')
                    ->acceptedFileTypes(['application/pdf'])
                    ->helperText('Tambahkan foto sertifikat dengan format PDF (maximum 80MB')
                    ->directory('accreditation'),

                Select::make('major_id')
                    ->label('Jurusan')
                    ->relationship('major', 'name')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Akreditasi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('certificate')
                    ->label('Sertifikat (PDF)')
                    ->formatStateUsing(function ($state) {
                        // Tangani path relatif
                        $url = asset('storage/' . $state);

                        // Perbaiki URL untuk file di folder accreditation
                        if (!str_starts_with($state, 'accreditation/')) {
                            $url = asset('storage/accreditation/' . $state);
                        }

                        return '<a href="' . $url . '" target="_blank" class="text-blue-500 underline">Preview PDF</a>';
                    })
                    ->html(),
                // ->helperText('Upload sertifikat dengan format PDF (maximum 80MB)'),

                TextColumn::make('major.name')
                    ->label('Jurusan')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            'index' => Pages\ListAkreditasis::route('/'),
            'create' => Pages\CreateAkreditasi::route('/create'),
            'edit' => Pages\EditAkreditasi::route('/{record}/edit'),
        ];
    }
}
