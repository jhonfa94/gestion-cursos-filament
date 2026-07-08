<?php

namespace App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class LessonsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->label('URL amigable')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                \Filament\Tables\Columns\TextColumn::make('duration_minutes')
                    ->label('Duración')
                    ->numeric()
                    ->suffix(' min')
                    ->sortable()
                    ->alignCenter(),

                \Filament\Tables\Columns\TextColumn::make('order')
                    ->label('Orden')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                \Filament\Tables\Columns\IconColumn::make('is_free')
                    ->label('Gratuita')
                    ->boolean()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('video_url')
                    ->label('Video')
                    ->formatStateUsing(fn(?string $state): string => $state ? '🎥 Sí' : '❌ No')
                    ->alignCenter()
                    ->toggleable(),

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
