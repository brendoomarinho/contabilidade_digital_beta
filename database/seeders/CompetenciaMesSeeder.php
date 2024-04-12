<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompetenciaMes;

class CompetenciaMesSeeder extends Seeder
{
    public function run(): void
    {
        $months = [
            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ];

        foreach ($months as $index => $month) {
            CompetenciaMes::create([
                'id' => $index + 1,
                'mes' => $month
            ]);
        }
    }
}
