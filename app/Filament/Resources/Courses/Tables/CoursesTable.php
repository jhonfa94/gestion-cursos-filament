<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image')
                    ->label('Imagen')
                    ->circular()
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl('/images/course-placeholder.jpg'),

                \Filament\Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                \Filament\Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría')
                    ->badge()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('level.name')
                    ->label('Nivel')
                    ->badge()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('instructor.name')
                    ->label('Instructor')
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('price')
                    ->label('Precio')
                    ->money('EUR')
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('duration_hours')
                    ->label('Duración')
                    ->suffix(' h')
                    ->alignCenter()
                    ->sortable(),

                \Filament\Tables\Columns\IconColumn::make('is_published')
                    ->label('Publicado')
                    ->boolean()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('published_at')
                    ->label('Fecha publicación')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name'),

                \Filament\Tables\Filters\SelectFilter::make('level_id')
                    ->label('Nivel')
                    ->relationship('level', 'name'),

                \Filament\Tables\Filters\SelectFilter::make('instructor_id')
                    ->label('Instructor')
                    ->relationship(
                        'instructor',
                        'name',
                        fn($query) =>
                        $query->whereHas('roles', fn($q) => $q->where('role_id', \App\Models\Role::INSTRUCTOR))
                    ),

                \Filament\Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Estado publicación')
                    ->placeholder('Todos')
                    ->trueLabel('Publicado')
                    ->falseLabel('Borrador'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
