<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FolhaPagamento;

class FolhaPagamentoSeeder extends Seeder
{
    public function run(): void
    {
        FolhaPagamento::factory(750)->create();
    }
}
