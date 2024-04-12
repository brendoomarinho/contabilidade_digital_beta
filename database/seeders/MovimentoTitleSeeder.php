<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MovimentoTitle;

class MovimentoTitleSeeder extends Seeder
{
    public function run()
    {
        MovimentoTitle::create(['title' => 'Notas de serviços tomados']);
        MovimentoTitle::create(['title' => 'Relatório máquina de cartão']);
        MovimentoTitle::create(['title' => 'Simples Remessa']);
    }
}
