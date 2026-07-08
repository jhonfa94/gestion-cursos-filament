<?php

namespace App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\RelationManagers;

use App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\LessonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TitleRelationManager extends RelationManager
{
    protected static string $relationship = 'title';

    protected static ?string $relatedResource = LessonResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
