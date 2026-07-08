<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'description' => 'Cursos y artículos sobre desarrollo web frontend y backend',
                'color' => '#3B82F6',
                'icon' => 'heroicon-o-code-bracket',
                'is_active' => true,
            ],
            [
                'name' => 'Marketing Digital',
                'slug' => 'marketing-digital',
                'description' => 'Estrategias de marketing online y redes sociales',
                'color' => '#EC4899',
                'icon' => 'heroicon-o-megaphone',
                'is_active' => true,
            ],
            [
                'name' => 'Diseño',
                'slug' => 'diseno',
                'description' => 'Diseño gráfico, UX/UI y herramientas creativas',
                'color' => '#8B5CF6',
                'icon' => 'heroicon-o-paint-brush',
                'is_active' => true,
            ],
            [
                'name' => 'Negocios',
                'slug' => 'negocios',
                'description' => 'Emprendimiento, finanzas y gestión empresarial',
                'color' => '#10B981',
                'icon' => 'heroicon-o-briefcase',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
