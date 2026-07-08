<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->label('URL amigable')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\ColorColumn::make('color')
                    ->label('Color'),

                \Filament\Tables\Columns\TextColumn::make('courses_count')
                    ->label('Cursos')
                    ->counts('courses')
                    ->alignCenter(),

                \Filament\Tables\Columns\TextColumn::make('articles_count')
                    ->label('Artículos')
                    ->counts('articles')
                    ->alignCenter(),

                \Filament\Tables\Columns\IconColumn::make('is_active')
                    ->label('Activa')
                    ->boolean(),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Creada')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
