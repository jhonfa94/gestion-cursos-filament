<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Datos Personales')
                    ->columns(2)
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),

                        \Filament\Forms\Components\TextInput::make('email')
                            ->label('Correo electrónico')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),

                        \Filament\Forms\Components\TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $operation): bool => $operation === 'create'),

                        \Filament\Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email verificado el'),
                    ]),

                \Filament\Schemas\Components\Section::make('Roles')
                    ->schema([
                        \Filament\Forms\Components\CheckboxList::make('roles')
                            ->label('Roles del usuario')
                            ->relationship('roles', 'display_name')
                            ->columns(2),
                    ]),
            ]);
    }
}
