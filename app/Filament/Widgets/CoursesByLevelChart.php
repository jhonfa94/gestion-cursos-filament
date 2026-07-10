<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CoursesByLevelChart extends ChartWidget
{
    protected ?string $heading = 'Cursos por Nivel de Dificultad';

    protected ?string $maxHeight = '300px';

    protected ?string $minHeight = '300px';

    protected function getData(): array
    {
        $levels = \App\Models\Level::withCount('courses')
            ->orderBy('order')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Cursos por Nivel',
                    'data' => $levels->pluck('courses_count')->toArray(),
                    'backgroundColor' => $levels->pluck('color')->toArray(),
                    'borderWidth' => 2,
                    'borderColor' => '#ffffff',
                ],
            ],
            'labels' => $levels->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'aspectRatio' => 1,
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
