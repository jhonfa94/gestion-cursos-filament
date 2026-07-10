<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TopRatedCoursesWidget extends TableWidget
{
    protected static ?string $heading = 'Cursos Mejor Valorados';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Course::query()
                    ->withAvg('reviews', 'rating')
                    ->withCount('reviews')
                    ->having('reviews_count', '>', 0)
                    ->orderBy('reviews_avg_rating', 'desc')
                    ->limit(5)
            )
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('title')
                    ->label('Curso')
                    ->weight('bold')
                    ->wrap(),

                \Filament\Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría')
                    ->badge(),

                \Filament\Tables\Columns\TextColumn::make('instructor.name')
                    ->label('Instructor'),

                \Filament\Tables\Columns\TextColumn::make('reviews_avg_rating')
                    ->label('Valoración')
                    ->formatStateUsing(
                        fn(?string $state): string =>
                        $state ? str_repeat('⭐', (int) round((float) $state)) . ' (' . number_format((float) $state, 1) . ')' : '-'
                    )
                    ->alignCenter(),

                \Filament\Tables\Columns\TextColumn::make('reviews_count')
                    ->label('Reseñas')
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
            ])
            ->paginated(false);
    }
}
