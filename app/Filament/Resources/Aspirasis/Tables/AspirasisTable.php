<?php

namespace App\Filament\Resources\Aspirasis\Tables;

use App\Models\Kategori;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Components\View;
use Filament\Actions\DeleteBulkAction;
use Filament\Schemas\Components\Image;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class AspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Aspirasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kategori.ket_kategori')
                    ->label('Kategori')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Menunggu' => 'warning',
                        'Proses' => 'info',
                        'Selesai' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('user.nis')
                    ->label('NIS')
                    ->sortable(),
                TextColumn::make('keterangan')
                    ->html()
                    ->limit(50)
                    ->wrap()
                    ->searchable(),
                ImageColumn::make('foto')
                    ->disk('public')
                    ->width('auto')
                    ->height(100)
                    ->label('Foto')
                    ->searchable(),
                TextColumn::make('lokasi')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
