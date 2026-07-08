<?php

namespace App\Filament\Resources\Courses\Resources\Modules\Schemas;

use Filament\Schemas\Schema;

class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->label('Título del módulo')
                    ->required()
                    ->maxLength(255),

                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3),

                \Filament\Forms\Components\TextInput::make('order')
                    ->label('Orden')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                \Filament\Forms\Components\Toggle::make('is_published')
                    ->label('Publicado')
                    ->default(false),
            ]);
    }
}
