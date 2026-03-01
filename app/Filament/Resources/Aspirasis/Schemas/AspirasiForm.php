<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Tiptap\Editor;
use Filament\Schemas\Schema;
use function Laravel\Prompts\search;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Image;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Berikan Feedback untuk Siswa')
                    ->schema([
                RichEditor::make('feedback')
                    ->label('Feedback untuk Siswa')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('attachments')
                    ->fileAttachmentsVisibility('public')
                    ->nullable()
                    ->columnSpanFull()
                    ->extraInputAttributes(['style' => 'min-height: 200px;']),

                Section::make('Status')
                    ->schema([
                    Select::make('status')
                    ->label('Status saat ini')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Proses' => 'Proses',
                        'Selesai' => 'Selesai',
                    ])
                    ->required()
                    ])
                    ])->columnSpanFull(),

                Section::make('Aspirasi yang ingin disampaikan')
                    ->schema([
                TextInput::make('judul')
                    ->disabled()
                    ->label('Judul Aspirasi')
                    ->placeholder('Masukkan judul aspirasi')
                    ->maxLength(100)
                    ->required(),
                Select::make('id_kategori')
                    ->disabled()
                    ->relationship('kategori', 'ket_kategori')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('id_user')
                    ->disabled()
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Textarea::make('lokasi')
                    ->disabled()
                    ->label('Lokasi Kejadian')
                    ->placeholder('Contoh: Kantin Sekolah, Lantai 2')
                    ->rows(3)
                    ->required(),
                    ]),

                Section::make('Masukan Foto Pendukung (jika ada)')
                    ->schema([
                FileUpload::make('foto')
                    ->disabled()
                    ->image()
                    ->imageEditor()
                    ->openable(true)
                    ->disk('public')
                    ->directory('aspirasi-foto')
                    ->nullable(),
                    ]),

                Section::make()
                    ->schema([
                RichEditor::make('keterangan')
                    ->disabled()
                    ->required()
                    ->columnSpan('full')
                    ->extraInputAttributes(['style' => 'min-height: 200px;']),
                ])->columnSpanFull(),

            ]);
    }
}
