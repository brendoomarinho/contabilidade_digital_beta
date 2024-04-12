<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MovimentoEnvio;

class MovimentoEnvioSeeder extends Seeder
{
    public function run(): void
    {
       MovimentoEnvio::factory(50)->create();
    }
}

