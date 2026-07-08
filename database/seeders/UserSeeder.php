<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@courses.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->roles()->attach(Role::ADMIN);

        $instructor = User::create([
            'name' => 'Juan Pérez',
            'email' => 'instructor@courses.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $instructor->roles()->attach([Role::INSTRUCTOR]);

        $author = User::create([
            'name' => 'María García',
            'email' => 'author@courses.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $author->roles()->attach(Role::AUTHOR);

        $student = User::create([
            'name' => 'Carlos López',
            'email' => 'student@courses.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $student->roles()->attach(Role::STUDENT);
    }
}
