<?php

namespace App\Filament\Siswa\Resources\Aspirasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;

use function Symfony\Component\String\s;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Aspirasi yang ingin disampaikan')
                    ->schema([
                TextInput::make('judul')
                    ->label('Judul Aspirasi')
                    ->placeholder('Masukkan judul aspirasi')
                    ->maxLength(100)
                    ->required(),
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
                TextInput::make('status')
                    ->readOnly()
                    ->default('Menunggu'),
                Textarea::make('lokasi')
                    ->label('Lokasi Kejadian')
                    ->placeholder('Contoh: Kantin Sekolah, Lantai 2')
                    ->rows(3)
                    ->required(),
                    ]),

                Section::make()
                    ->schema([
                FileUpload::make('foto')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('aspirasi-foto')
                    ->nullable(),
                    ]),

                section::make()
                    ->schema([
                RichEditor::make('keterangan')
                    ->required()
                    ->columnSpan('full')
                    ->extraInputAttributes(['style' => 'min-height: 200px;'])
                    ])->columnSpanFull(),
            ]);
    }
}
