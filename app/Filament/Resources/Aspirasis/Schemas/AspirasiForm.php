<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Tiptap\Editor;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Image;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

use function Laravel\Prompts\search;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('foto')
                    ->image()
                    ->imageEditor()
                    ->openable(true)
                    ->disk('public')
                    ->directory('aspirasi-foto')
                    ->nullable(),
                Select::make('status')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai',
                    ])
                    ->required(),
                Select::make('id_kategori')
                    ->relationship('kategori', 'ket_kategori')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('id_user')
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
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
