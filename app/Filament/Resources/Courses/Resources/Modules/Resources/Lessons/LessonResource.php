<?php

namespace App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons;

use App\Filament\Resources\Courses\Resources\Modules\ModuleResource;
use App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\Pages\CreateLesson;
use App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\Pages\EditLesson;
use App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\Schemas\LessonForm;
use App\Filament\Resources\Courses\Resources\Modules\Resources\Lessons\Tables\LessonsTable;
use App\Models\Lesson;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPlay;

    protected static ?string $parentResource = ModuleResource::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Lecciones';

    protected static ?string $modelLabel = 'lección';

    protected static ?string $pluralModelLabel = 'lecciones';


    public static function form(Schema $schema): Schema
    {
        return LessonForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LessonsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateLesson::route('/create'),
            'edit' => EditLesson::route('/{record}/edit'),
        ];
    }
}
