<?php

namespace App\Filament\Siswa\Pages\Auth;

use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Auth\Pages\Login;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;
use SensitiveParameter;

//Buat Form Login Custom difilament
class LoginCustom extends Login
{

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->label('NIS')
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

        protected function getCredentialsFromFormData(#[SensitiveParameter] array $data): array
    {
        return [
            'nis' => $data['nis'],
            'password' => $data['password'],
        ];
    }

        protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.nis' => __('filament-panels::auth/pages/login.messages.failed'),
        ]);
    }

}
