<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programas')->insert([
            ['nombre' => 'Ayuda para principiantes', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Entrenamiento avanzado', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Entrenamiento de fuerza', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pérdida de peso', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Sin equipo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}