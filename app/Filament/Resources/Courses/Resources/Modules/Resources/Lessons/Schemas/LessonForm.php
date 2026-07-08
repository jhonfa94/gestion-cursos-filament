<?php

namespace App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\Schemas;

use Filament\Schemas\Schema;

class LessonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Información Básica')
                    ->columns(2)
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')
                            ->label('Título de la lección')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (\Filament\Schemas\Components\Utilities\Get $get, \Filament\Schemas\Components\Utilities\Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== \Illuminate\Support\Str::slug($old)) {
                                    return;
                                }
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            })
                            ->columnSpanFull(),

                        \Filament\Forms\Components\TextInput::make('slug')
                            ->label('URL amigable')
                            ->required()
                            ->maxLength(255),

                        \Filament\Forms\Components\TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),

                        \Filament\Forms\Components\TextInput::make('duration_minutes')
                            ->label('Duración (minutos)')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),

                        \Filament\Forms\Components\Toggle::make('is_free')
                            ->label('Lección gratuita')
                            ->default(false),
                    ]),

                \Filament\Schemas\Components\Section::make('Contenido')
                    ->schema([
                        \Filament\Forms\Components\RichEditor::make('content')
                            ->label('Contenido de la lección'),

                        \Filament\Forms\Components\TextInput::make('video_url')
                            ->label('URL del video')
                            ->url()
                            ->placeholder('https://youtube.com/watch?v=...'),
                    ]),
            ]);
    }
}
