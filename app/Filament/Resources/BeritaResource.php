<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\News;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class BeritaResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Judul Berita'),

                    TextInput::make('author')
                        ->required()
                        ->maxLength(255)
                        ->helperText('Penulis Berita')
                        ->default(fn() => auth()->user()->name ?? 'Unknown'),

                    Textarea::make('content')
                        ->required()
                        ->helperText('Konten Berita'),

                    FileUpload::make('thumbnail')
                        ->image()
                        ->required()
                        ->directory('news')
                        ->helperText('Unggah gambar untuk Thumbnail (Maximum 80MB)'),

                    DateTimePicker::make('published_at')
                        ->required()
                        ->helperText('Tanggal dan Waktu Penerbitan')
                        ->default(fn() => now()),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Judul Berita'),

                TextColumn::make('author')
                    ->sortable()
                    ->label('Penulis'),

                ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),

                TextColumn::make('published_at')
                    ->sortable()
                    ->dateTime()
                    ->label('Tanggal Penerbitan'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
