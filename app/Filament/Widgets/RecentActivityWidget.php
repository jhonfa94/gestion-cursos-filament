<?php

namespace App\Filament\Widgets;

use App\Models\Review;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentActivityWidget extends TableWidget
{
    protected static ?string $heading = 'Actividad Reciente';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Review::query()
                    ->with(['course', 'user'])
                    ->latest()
                    ->limit(8)
            )
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario')
                    ->weight('bold'),

                \Filament\Tables\Columns\TextColumn::make('course.title')
                    ->label('Curso')
                    ->limit(40)
                    ->wrap(),

                \Filament\Tables\Columns\TextColumn::make('rating')
                    ->label('Valoración')
                    ->formatStateUsing(fn(string $state): string => str_repeat('⭐', (int) $state))
                    ->alignCenter(),

                \Filament\Tables\Columns\TextColumn::make('comment')
                    ->label('Comentario')
                    ->limit(50)
                    ->wrap()
                    ->placeholder('Sin comentario'),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Hace')
                    ->since()
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
