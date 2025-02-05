<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // Importar el modelo de roles

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate(); 

        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'editor']);

        // Crear usuario administrador
        $admin = User::firstOrCreate([
            'email' => 'maduenobolanos@gmail.com',
        ], [
            'name' => 'Damian',
            'password' => Hash::make('micedais1'),
        ]);

        // Asignar rol de administrador
        $admin->assignRole($adminRole);

        // Crear usuario normal
        $user = User::firstOrCreate([
            'email' => 'yowi@gmail.com',
        ], [
            'name' => 'Yowi',
            'password' => Hash::make('password123'),
        ]);

        // Asignar rol de usuario
        $user->assignRole($userRole);
    }
}
