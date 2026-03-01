<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Membuat Akun User Baru ( Siswa / Admin )')
                    ->schema([
                        Select::make('role')
                            ->options([
                                'admin' => 'Admin',
                                'siswa' => 'Siswa',
                            ])
                            ->required(),
                        TextInput::make('name')
                            ->required(),
                        Section::make('Jika Rolenya Siswa, Wajib Mengisi NIS')
                            ->description('Untuk siswa, dikarna siswa login menggunakan NIS sebagai username, Jika anda sedang membuat user dengan role admin ini tidak perlu diisi')
                            ->schema([

                                TextInput::make('nis')
                                ->unique()
                                ->validationMessages([
                                    'unique' => 'Nis ini sudah terdaftar'
                                ])

                            ]),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email(),
                        TextInput::make('password')
                            ->password()
                            ->required(),

                    ])->columnSpanFull(),

            ]);
    }
}
