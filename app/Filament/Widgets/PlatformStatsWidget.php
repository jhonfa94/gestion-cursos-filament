<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PlatformStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
         return [
            Stat::make('Total de Cursos', \App\Models\Course::count())
                ->description('Cursos disponibles en la plataforma')
                ->descriptionIcon('heroicon-s-academic-cap')
                ->color('success'),

            Stat::make(
                'Estudiantes Activos',
                \App\Models\User::whereHas('roles', fn($q) => $q->where('role_id', \App\Models\Role::STUDENT))->count())
                ->description('Usuarios registrados como estudiantes')
                ->descriptionIcon('heroicon-s-users')
                ->color('info'),

            Stat::make(
                'Instructores',
                \App\Models\User::whereHas('roles', fn($q) => $q->where('role_id', \App\Models\Role::INSTRUCTOR))->count())
                ->description('Instructores en la plataforma')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('warning'),

            Stat::make(
                'Valoraciones Promedio',
                number_format(\App\Models\Review::where('is_approved', true)->avg('rating') ?? 0, 1))
                ->description('Puntuación media de todos los cursos')
                ->descriptionIcon('heroicon-s-star')
                ->color('success'),
        ];
    }
}
