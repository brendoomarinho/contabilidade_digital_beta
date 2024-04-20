<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MovimentoTitle;

class MovimentoTitleSeeder extends Seeder
{
    public function run()
    {
        $titles = [
            'Notas de serviços tomados',
            'Relatório máquina de cartão',
            'Simples Remessa'
        ];

        foreach ($titles as $title) {
            MovimentoTitle::create(['title' => $title]);
        }
    }
}
