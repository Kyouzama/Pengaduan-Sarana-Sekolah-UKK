<?php

namespace App\Filament\Siswa\Resources\Aspirasis;

use App\Filament\Siswa\Resources\Aspirasis\Pages\CreateAspirasi;
use App\Filament\Siswa\Resources\Aspirasis\Pages\EditAspirasi;
use App\Filament\Siswa\Resources\Aspirasis\Pages\ListAspirasis;
use App\Filament\Siswa\Resources\Aspirasis\Schemas\AspirasiForm;
use App\Filament\Siswa\Resources\Aspirasis\Tables\AspirasisTable;
use App\Models\Aspirasi;
use BackedEnum;
use BladeUI\Icons\Components\Icon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AspirasiResource extends Resource
{
    protected static ?string $model = Aspirasi::class;


    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedDocumentText;

    public static function form(Schema $schema): Schema
    {
        return AspirasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AspirasisTable::configure($table);
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
            'index' => ListAspirasis::route('/'),
            'create' => CreateAspirasi::route('/create'),
            'edit' => EditAspirasi::route('/{record}/edit'),
        ];
    }
}
