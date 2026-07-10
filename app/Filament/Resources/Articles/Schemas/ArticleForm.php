<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Información Básica')
                    ->columns(2)
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')
                            ->label('Título')
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
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->columnSpanFull(),

                        \Filament\Forms\Components\Select::make('author_id')
                            ->label('Autor')
                            ->relationship(
                                'author',
                                'name',
                                fn($query) =>
                                $query->whereHas('roles', fn($q) => $q->where('role_id', \App\Models\Role::AUTHOR))
                            )
                            ->required(),

                        \Filament\Forms\Components\Select::make('category_id')
                            ->label('Categoría')
                            ->relationship('category', 'name')
                            ->required(),

                        \Filament\Forms\Components\Toggle::make('is_published')
                            ->label('Publicado')
                            ->default(false)
                            ->inline(false),

                        \Filament\Forms\Components\DateTimePicker::make('published_at')
                            ->label('Fecha de publicación'),
                    ]),

                \Filament\Schemas\Components\Section::make('Contenido')
                    ->schema([
                        \Filament\Forms\Components\Textarea::make('excerpt')
                            ->label('Extracto')
                            ->required()
                            ->rows(3),

                        \Filament\Forms\Components\RichEditor::make('content')
                            ->label('Contenido completo')
                            ->required(),

                        \Filament\Forms\Components\FileUpload::make('featured_image')
                            ->label('Imagen destacada')
                            ->image()
                            ->directory('articles')
                            ->disk('public')
                            ->visibility('public'),
                    ]),

                \Filament\Schemas\Components\Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('meta_title')
                            ->label('Título SEO')
                            ->maxLength(60),

                        \Filament\Forms\Components\Textarea::make('meta_description')
                            ->label('Descripción SEO')
                            ->maxLength(160)
                            ->rows(3),

                        \Filament\Forms\Components\TextInput::make('meta_keywords')
                            ->label('Palabras clave')
                            ->placeholder('Separadas por comas'),
                    ]),

                \Filament\Schemas\Components\Section::make('Etiquetas')
                    ->schema([
                        \Filament\Forms\Components\CheckboxList::make('tags')
                            ->label('Etiquetas')
                            ->relationship('tags', 'name')
                            ->columns(3),
                    ]),
            ]);
    }
}
