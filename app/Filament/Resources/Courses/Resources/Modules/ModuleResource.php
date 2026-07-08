<?php

namespace App\Filament\Resources\Courses\Resources\Modules;

use App\Filament\Resources\Courses\CourseResource;
use App\Filament\Resources\Courses\Resources\Modules\Pages\CreateModule;
use App\Filament\Resources\Courses\Resources\Modules\Pages\EditModule;
use App\Filament\Resources\Courses\Resources\Modules\Schemas\ModuleForm;
use App\Filament\Resources\Courses\Resources\Modules\Tables\ModulesTable;
use App\Models\Module;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\Courses\Resources\Modules\RelationManagers\LessonsRelationManager;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolderOpen;

    protected static ?string $parentResource = CourseResource::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Módulos';

    protected static ?string $modelLabel = 'módulo';

    protected static ?string $pluralModelLabel = 'módulos';

    public static function form(Schema $schema): Schema
    {
        return ModuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            LessonsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateModule::route('/create'),
            'edit' => EditModule::route('/{record}/edit'),
        ];
    }
}
