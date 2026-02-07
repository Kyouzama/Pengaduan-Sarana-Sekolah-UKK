<?php

namespace App\Filament\Siswa\Resources\Aspirasis\Pages;

use App\Filament\Siswa\Resources\Aspirasis\AspirasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAspirasi extends EditRecord
{
    protected static string $resource = AspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
