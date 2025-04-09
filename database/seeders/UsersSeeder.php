<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);
        $recepcionistaRole = Role::firstOrCreate(['name' => 'recepcionista']);

        // Crear usuarios y asignar roles
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Administrador',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        $recepcionista = User::firstOrCreate([
            'email' => 'recepcionista@example.com'
        ], [
            'name' => 'Recepcionista',
            'password' => bcrypt('password'),
        ]);
        $recepcionista->assignRole($recepcionistaRole);
    }
}