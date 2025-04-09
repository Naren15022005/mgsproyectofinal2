<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaFlujosIESSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['id' => 1, 'nombre' => 'Salario', 'descripcion' => 'Ingreso por salario'],
            ['id' => 2, 'nombre' => 'Venta', 'descripcion' => 'Ingreso por venta de productos'],
            ['id' => 3, 'nombre' => 'Compra', 'descripcion' => 'Egreso por compra de productos'],
            ['id' => 4, 'nombre' => 'Servicio', 'descripcion' => 'Egreso por servicios'],
        ];

        foreach ($categorias as $categoria) {
            DB::table('categoria_flujos_i_es')->updateOrInsert(
                ['id' => $categoria['id']],
                ['nombre' => $categoria['nombre'], 'descripcion' => $categoria['descripcion']]
            );
        }
    }
}