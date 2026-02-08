<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Masukan Kategori Baru')
                    ->schema([
                TextInput::make('ket_kategori')
                    ->label('Keterangan Kategori')
                    ->required(),
                    ])->columnSpanFull(),
            ]);
    }
}
