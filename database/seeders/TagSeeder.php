<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Laravel', 'slug' => 'laravel', 'color' => '#FF2D20'],
            ['name' => 'PHP', 'slug' => 'php', 'color' => '#777BB4'],
            ['name' => 'Vue.js', 'slug' => 'vuejs', 'color' => '#4FC08D'],
            ['name' => 'React', 'slug' => 'react', 'color' => '#61DAFB'],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'color' => '#F7DF1E'],
            ['name' => 'CSS', 'slug' => 'css', 'color' => '#1572B6'],
            ['name' => 'HTML', 'slug' => 'html', 'color' => '#E34F26'],
            ['name' => 'Tailwind CSS', 'slug' => 'tailwind', 'color' => '#06B6D4'],
            ['name' => 'MySQL', 'slug' => 'mysql', 'color' => '#4479A1'],
            ['name' => 'Git', 'slug' => 'git', 'color' => '#F05032'],
            ['name' => 'Docker', 'slug' => 'docker', 'color' => '#2496ED'],
            ['name' => 'Filament', 'slug' => 'filament', 'color' => '#FDBA74'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
