<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiKelulusanResource\Pages;
use App\Models\Graduation;
use App\Models\Major;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;

class InformasiKelulusanResource extends Resource
{
    protected static ?string $model = Graduation::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationLabel = 'Informasi Kelulusan';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('major_id')
                        ->label('Jurusan')
                        ->options(Major::all()->pluck('name', 'id'))
                        ->required()
                        ->helperText('Pilih jurusan yang terkait dengan informasi kelulusan'),

                    Select::make('year')
                        ->options([
                            '2023' => '2023',
                            '2024' => '2024',
                            '2025' => '2025',
                            '2026' => '2026',
                            '2027' => '2027',
                            '2028' => '2028',
                            '2029' => '2029',
                            '2030' => '2030',
                            '2031' => '2031',
                            '2032' => '2032',
                            '2033' => '2033',
                            '2034' => '2034',
                            '2035' => '2035',
                            '2036' => '2036',
                            '2037' => '2037',
                            '2038' => '2038',
                            '2039' => '2039',
                            '2040' => '2040',
                            '2041' => '2041',
                            '2042' => '2042',
                            '2043' => '2043',
                            '2044' => '2044',
                            '2045' => '2045',
                            '2046' => '2046',
                            '2047' => '2047',
                            '2048' => '2048',
                            '2049' => '2049',
                            '2050' => '2050',
                        ])
                        ->required()
                        ->label('Tahun Kelulusan')
                        ->helperText('Pilih tahun kelulusan'),

                    FileUpload::make('pdf')
                        ->label('File Kelulusan (PDF)')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required()
                        ->directory('graduation')
                        ->helperText('Unggah file PDF yang berisi informasi kelulusan (Maxmimum 80MB)')
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

                TextColumn::make('year')
                    ->label('Tahun Kelulusan')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('pdf')
                    ->label('File Informasi Kelulusan')
                    ->sortable()
                    ->url(fn(Graduation $record) => asset('storage/' . $record->pdf))
            ])
            ->filters([
                // Filter berdasarkan jurusan atau tahun jika diperlukan
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
            'index' => Pages\ListInformasiKelulusans::route('/'),
            'create' => Pages\CreateInformasiKelulusan::route('/create'),
            'edit' => Pages\EditInformasiKelulusan::route('/{record}/edit'),
        ];
    }
}
