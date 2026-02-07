<?php

namespace App\Filament\Siswa\Resources\Aspirasis\Pages;

use App\Filament\Siswa\Resources\Aspirasis\AspirasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAspirasis extends ListRecords
{
    protected static string $resource = AspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
