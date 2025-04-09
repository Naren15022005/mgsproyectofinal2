<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDeMembresiaSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipos_de_membresia')->insert([
            ['nombre' => 'Plan Básico'],
            ['nombre' => 'Plan medio'],
            ['nombre' => 'Plan Premium'],
            ['nombre' => 'VIP'],
        ]);
    }
}
