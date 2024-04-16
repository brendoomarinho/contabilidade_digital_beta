<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CertidaoTitle;

class CertidaoTitleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['title' => 'ALVARÁ DE FUNCIONAMENTO', 'orgao' => 'Municipal'],
            ['title' => 'LICENÇA AMBIENTAL', 'orgao' => 'Estadual'],
            ['title' => 'USO DO SOLO', 'orgao' => 'Federal'],
        ];

        foreach ($data as $item) {
            CertidaoTitle::create($item);
        }
    }
}
