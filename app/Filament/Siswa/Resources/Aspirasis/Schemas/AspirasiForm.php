<?php

namespace App\Filament\Siswa\Resources\Aspirasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_kategori')
                    ->relationship('kategori', 'ket_kategori')
                    ->required()
                    ->preload()
                    ->searchable(),
                Select::make('id_user')
                    ->relationship('user', 'name')
                    ->default(auth()->id())
                    ->disabled()
                    ->dehydrated() // Penting agar nilai tetap dikirim ke database saat simpan
                    ->required(),
                FileUpload::make('foto')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('aspirasi-foto')
                    ->nullable(),
                TextInput::make('status')
                    ->readOnly()
                    ->default('Menunggu'),
                Textarea::make('lokasi')
                    ->label('Lokasi Kejadian')
                    ->placeholder('Contoh: Kantin Sekolah, Lantai 2')
                    ->rows(3)
                    ->required(),
                RichEditor::make('keterangan')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }
}
