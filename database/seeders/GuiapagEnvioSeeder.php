<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\GuiapagEnvio;

class GuiapagEnvioSeeder extends Seeder
{
    public function run(): void
    {
        GuiapagEnvio::factory(50)->create();
    }
}
