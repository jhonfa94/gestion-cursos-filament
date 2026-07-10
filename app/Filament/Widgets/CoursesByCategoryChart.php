<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CoursesByCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Cursos por Categoría';

    protected ?string $maxHeight = '300px';

    protected ?string $minHeight = '300px';

    protected function getData(): array
    {
        $categories = \App\Models\Category::withCount('courses')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Número de Cursos',
                    'data' => $categories->pluck('courses_count')->toArray(),
                    'backgroundColor' => $categories->pluck('color')->toArray(),
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}

