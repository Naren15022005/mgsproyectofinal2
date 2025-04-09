<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['id' => 1, 'nombre' => 'herramientas de entrenamiento'],
            ['id' => 2, 'nombre' => 'Ropa'],
            ['id' => 3, 'nombre' => 'Suplementos nutricionales'],
            ['id' => 4, 'nombre' => 'Hidratacion y bebidas'],
            ['id' => 5, 'nombre' => 'Accesorios'],
            ['id' => 6, 'nombre' => 'Equipamiento de entrenamiento'],
            

        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias_productos')->updateOrInsert(
                ['id' => $categoria['id']],
                ['nombre' => $categoria['nombre']]
            );
        }
    }
}