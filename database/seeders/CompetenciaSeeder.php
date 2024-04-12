<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competencia;

class CompetenciaSeeder extends Seeder
{
    public function run(): void
    {
        $startYear = 2024;
        $endYear = 2026;
        $currentYearId = 1;

        for ($year = $startYear; $year <= $endYear; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                Competencia::create([
                    'mes_id' => $month,
                    'ano_id' => $currentYearId
                ]);
            }
            $currentYearId++;
        }
    }
}
