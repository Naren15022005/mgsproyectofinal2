<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registros')->insert([
            [
                'name' => 'Maria',
                'email' => 'mq451180@gmail.com',
                'programa' => 'Entrenamiento avanzado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}