<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CertidaoEnvio;

class CertidaoEnvioSeeder extends Seeder
{
    public function run(): void
    {
        CertidaoEnvio::factory(20)->create();
    }
}
