<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tarifs')->insert([
            [
                'power' => 450,
                'tarif_per_kwh' => 415,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'power' => 900,
                'tarif_per_kwh' => 605,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'power' => 1300,
                'tarif_per_kwh' => 1352,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'power' => 2200,
                'tarif_per_kwh' => 1444,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'power' => 3500,
                'tarif_per_kwh' => 1467,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}