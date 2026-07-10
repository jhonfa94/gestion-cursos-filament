<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('course.title')
                    ->label('Curso')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                \Filament\Tables\Columns\TextColumn::make('user.name')
                    ->label('Estudiante')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('rating')
                    ->label('Puntuación')
                    ->formatStateUsing(fn(string $state): string => str_repeat('⭐', (int) $state))
                    ->sortable()
                    ->alignCenter(),

                \Filament\Tables\Columns\TextColumn::make('comment')
                    ->label('Comentario')
                    ->limit(50)
                    ->wrap()
                    ->toggleable(),

                \Filament\Tables\Columns\IconColumn::make('is_approved')
                    ->label('Aprobada')
                    ->boolean()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
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
