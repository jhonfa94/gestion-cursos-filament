<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['id' => \App\Models\Role::ADMIN, 'name' => 'admin', 'display_name' => 'Administrador', 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Models\Role::INSTRUCTOR, 'name' => 'instructor', 'display_name' => 'Instructor', 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Models\Role::AUTHOR, 'name' => 'author', 'display_name' => 'Autor', 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Models\Role::STUDENT, 'name' => 'student', 'display_name' => 'Estudiante', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
