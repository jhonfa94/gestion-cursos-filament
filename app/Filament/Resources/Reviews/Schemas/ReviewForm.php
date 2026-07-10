<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Valoración')
                    ->columns(2)
                    ->schema([
                        \Filament\Forms\Components\Select::make('course_id')
                            ->label('Curso')
                            ->relationship('course', 'title')
                            ->required()
                            ->searchable(),

                        \Filament\Forms\Components\Select::make('user_id')
                            ->label('Estudiante')
                            ->relationship(
                                'user',
                                'name',
                                fn($query) =>
                                $query->whereHas('roles', fn($q) => $q->where('role_id', \App\Models\Role::STUDENT))
                            )
                            ->required()
                            ->searchable()
                            ->rules([
                                fn($get, $record) => function ($attribute, $value, $fail) use ($get, $record) {
                                    $courseId = $get('course_id');
                                    if ($courseId && $value) {
                                        $query = \App\Models\Review::where('course_id', $courseId)
                                            ->where('user_id', $value);

                                        // Excluir el registro actual si está editando
                                        if ($record) {
                                            $query->where('id', '!=', $record->id);
                                        }

                                        if ($query->exists()) {
                                            $fail('Este estudiante ya ha valorado este curso.');
                                        }
                                    }
                                },
                            ]),

                        \Filament\Forms\Components\Select::make('rating')
                            ->label('Puntuación')
                            ->required()
                            ->options([
                                1 => '⭐ 1 estrella',
                                2 => '⭐⭐ 2 estrellas',
                                3 => '⭐⭐⭐ 3 estrellas',
                                4 => '⭐⭐⭐⭐ 4 estrellas',
                                5 => '⭐⭐⭐⭐⭐ 5 estrellas',
                            ]),

                        \Filament\Forms\Components\Toggle::make('is_approved')
                            ->label('Aprobada')
                            ->default(false)
                            ->inline(false),
                    ]),

                \Filament\Schemas\Components\Section::make('Comentario')
                    ->schema([
                        \Filament\Forms\Components\Textarea::make('comment')
                            ->label('Comentario del usuario')
                            ->rows(4),
                    ]),
            ]);
    }
}
