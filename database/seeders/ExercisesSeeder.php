<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercises')->insert([
            ['programa' => 'Ayuda para principiantes', 'ejercicio' => 'Sentadillas con peso corporal', 'series' => 3, 'repeticiones' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Ayuda para principiantes', 'ejercicio' => 'Flexiones de rodillas', 'series' => 3, 'repeticiones' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Ayuda para principiantes', 'ejercicio' => 'Plancha abdominal', 'series' => 3, 'repeticiones' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Ayuda para principiantes', 'ejercicio' => 'Elevaciones de talón', 'series' => 3, 'repeticiones' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Ayuda para principiantes', 'ejercicio' => 'Puentes de glúteo', 'series' => 3, 'repeticiones' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento avanzado', 'ejercicio' => 'Sentadilla con barra', 'series' => 4, 'repeticiones' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento avanzado', 'ejercicio' => 'Peso muerto', 'series' => 4, 'repeticiones' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento avanzado', 'ejercicio' => 'Press de banca', 'series' => 4, 'repeticiones' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento avanzado', 'ejercicio' => 'Dominadas', 'series' => 4, 'repeticiones' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento avanzado', 'ejercicio' => 'Fondos en paralelas', 'series' => 4, 'repeticiones' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Pérdida de peso', 'ejercicio' => 'Burpees', 'series' => 4, 'repeticiones' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Pérdida de peso', 'ejercicio' => 'Saltar la cuerda', 'series' => 4, 'repeticiones' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Pérdida de peso', 'ejercicio' => 'Mountain climbers', 'series' => 4, 'repeticiones' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Pérdida de peso', 'ejercicio' => 'Zancadas alternas', 'series' => 4, 'repeticiones' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Pérdida de peso', 'ejercicio' => 'Jump Squats', 'series' => 4, 'repeticiones' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Sin equipo', 'ejercicio' => 'Flexiones de brazos', 'series' => 4, 'repeticiones' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Sin equipo', 'ejercicio' => 'Sentadilla isométrica', 'series' => 3, 'repeticiones' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Sin equipo', 'ejercicio' => 'Abdominales bicicleta', 'series' => 4, 'repeticiones' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Sin equipo', 'ejercicio' => 'Saltos de tijera', 'series' => 4, 'repeticiones' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Sin equipo', 'ejercicio' => 'Plancha lateral', 'series' => 3, 'repeticiones' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento de fuerza', 'ejercicio' => 'Peso muerto', 'series' => 5, 'repeticiones' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento de fuerza', 'ejercicio' => 'Sentadilla con barra', 'series' => 5, 'repeticiones' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento de fuerza', 'ejercicio' => 'Press militar', 'series' => 5, 'repeticiones' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento de fuerza', 'ejercicio' => 'Remo con barra', 'series' => 5, 'repeticiones' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['programa' => 'Entrenamiento de fuerza', 'ejercicio' => 'Curl de bíceps con mancuernas', 'series' => 4, 'repeticiones' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}