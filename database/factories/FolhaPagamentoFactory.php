<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FolhaPagamento;

class FolhaPagamentoFactory extends Factory
{
    protected $model = FolhaPagamento::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'atd' => $this->faker->numberBetween(0, 1),
            'user_admin' => $this->faker->numberBetween(1, 5),
            'retificador' => $this->faker->boolean,
            'recebido' => $this->faker->boolean,
            'ano_id' => $this->faker->numberBetween(1, 2),
            'mes_id' => $this->faker->numberBetween(1, 5),
            'dt_retificador' => now(),
            'valor' => $this->faker->randomFloat(2, 0, 10000),
            'extrato' => 'bootstrap-admin-dashboard-main.zip',
            'recibos' => 'bootstrap-admin-dashboard-main.zip',
            'anexo_resumo' => 'bootstrap-admin-dashboard-main.zip',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

