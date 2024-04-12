<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompetenciaAno;

class CompetenciaAnoSeeder extends Seeder
{
    public function run(): void
    {
        $startYear = 2024;
        $endYear = 2034;

        for ($year = $startYear; $year <= $endYear; $year++) {
            CompetenciaAno::create([
                'id' => $year - $startYear + 1,
                'ano' => $year
            ]);
        }
    }
}
