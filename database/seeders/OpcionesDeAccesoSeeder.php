<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpcionDeAcceso;

class OpcionesDeAccesoSeeder extends Seeder
{
    public function run()
    {
        $opciones = [
            ['nombre' => 'Acceso a la piscina'],
            ['nombre' => 'Acceso al gimnasio'],
            ['nombre' => 'Acceso a clases de yoga'],
            ['nombre' => 'Acceso a la sauna'],
        ];

        foreach ($opciones as $opcion) {
            OpcionDeAcceso::create($opcion);
        }
    }
}
