<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Schemas\Schema;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (\Filament\Schemas\Components\Utilities\Get $get, \Filament\Schemas\Components\Utilities\Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== \Illuminate\Support\Str::slug($old)) {
                            return;
                        }
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    }),

                \Filament\Forms\Components\TextInput::make('slug')
                    ->label('URL amigable')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3),

                \Filament\Forms\Components\ColorPicker::make('color')
                    ->label('Color')
                    ->default('#10B981'),

                \Filament\Forms\Components\TextInput::make('order')
                    ->label('Orden')
                    ->numeric()
                    ->default(1)
                    ->minValue(1),
            ]);
    }
}
