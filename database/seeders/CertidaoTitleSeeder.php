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
            ['title' => 'Certidão negativa de débitos municipais', 'orgao' => 'Municipal'],
            ['title' => 'Certidão negativa SEFAZ', 'orgao' => 'Estadual'],
            ['title' => 'Certidão negativa de débitos Federais', 'orgao' => 'Federal'],
        ];

        foreach ($data as $item) {
            CertidaoTitle::create($item);
        }
    }
}
