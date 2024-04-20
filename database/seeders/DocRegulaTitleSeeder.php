<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DocRegulaTitle;

class DocRegulaTitleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['title' => 'Alvará de funcionamento', 'orgao' => 'Municipal'],
            ['title' => 'Licença sanitária', 'orgao' => 'Municipal'],
            ['title' => 'Licença ambiental', 'orgao' => 'Municipal'],
            ['title' => 'Uso do solo', 'orgao' => 'Municipal'],
        ];

        foreach ($data as $item) {
            DocRegulaTitle::create($item);
        }
    }
}
