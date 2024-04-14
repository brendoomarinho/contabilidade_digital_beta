<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GuiapagTitle;

class GuiapagTitleSeeder extends Seeder
{
    public function run()
    {
        $titles = [
            'PGDAS Simples Nacional',
            'FGTS - DCTFWEB',
            'INSS 13 SALARIO'
        ];

        foreach ($titles as $title) {
            GuiapagTitle::create(['title' => $title]);
        }
    }
}
