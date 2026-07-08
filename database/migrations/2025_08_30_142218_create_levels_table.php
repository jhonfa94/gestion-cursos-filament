<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('color', 7)->default('#10B981');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        DB::table('levels')->insert([
            ['id' => \App\Models\Level::BEGINNER, 'name' => 'Principiante', 'slug' => 'principiante', 'description' => 'Nivel básico para comenzar', 'color' => '#10B981', 'order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Models\Level::INTERMEDIATE, 'name' => 'Intermedio', 'slug' => 'intermedio', 'description' => 'Conocimientos previos requeridos', 'color' => '#F59E0B', 'order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Models\Level::ADVANCED, 'name' => 'Avanzado', 'slug' => 'avanzado', 'description' => 'Nivel experto', 'color' => '#EF4444', 'order' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
