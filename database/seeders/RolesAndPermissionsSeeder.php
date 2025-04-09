<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos si no existen
        $permissions = [
            'gestionar usuarios',
            'gestionar clientes',
            'gestionar productos',
            'gestionar ingresos',
            'gestionar egresos',
            'ver informes',
            'generar informes',
            'gestionar pagos',
            'programar citas',
            'ver clientes',
            'gestionar rutinas',
            'programar clases',
            'ver perfil',
            'ver rutinas',
            'ver clases'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);
        $adminRole->syncPermissions([
            'gestionar usuarios', 
            'gestionar clientes', 
            'gestionar productos', 
            'gestionar ingresos', 
            'gestionar egresos', 
            'ver informes',
            'generar informes',
        ]);

        $recepcionistaRole = Role::firstOrCreate(['name' => 'recepcionista']);
        $recepcionistaRole->syncPermissions([
            'gestionar clientes', 
            'gestionar pagos', 
            'programar citas',
            'gestionar productos',
            'gestionar ingresos',
            'gestionar egresos',
            'generar informes',
        ]);

        $instructorRole = Role::firstOrCreate(['name' => 'instructor']);
        $instructorRole->syncPermissions([
            'ver clientes', 
            'gestionar rutinas', 
            'programar clases',
            'ver perfil'
        ]);

        $clienteRole = Role::firstOrCreate(['name' => 'cliente']);
        $clienteRole->syncPermissions([
            'ver perfil', 
            'ver rutinas', 
            'ver clases'
        ]);
    }
}
