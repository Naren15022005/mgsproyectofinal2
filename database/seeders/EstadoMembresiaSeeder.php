<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoMembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_membresia')->insert([
            ['nombre' => 'Activo'],
            ['nombre' => 'Inactivo'],
            ['nombre' => 'Suspendido'],
            ['nombre' => 'Pausa'],
            ['nombre' => 'Vencida'],
            ['nombre' => 'Sin membresia'],
            
        ]);
    }
}
