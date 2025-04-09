<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlujosIESSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener el ID del usuario creado en DatabaseSeeder
        $userId = DB::table('users')->where('email', 'admin@example.com')->value('id');

        // Verificar si se obtuvo el ID del usuario
        if (!$userId) {
            throw new \Exception('No se encontró el usuario con el email admin@example.com');
        }

        DB::table('flujos_i_es')->insert([
            [
                'usuario_id' => $userId,
                'tipo' => 'ingreso',
                'monto' => 1000.00,
                'descripcion' => 'Salario mensual',
                'fecha' => '2023-12-01',
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => $userId,
                'tipo' => 'egreso',
                'monto' => 200.00,
                'descripcion' => 'Compra de suministros',
                'fecha' => '2023-12-02',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
