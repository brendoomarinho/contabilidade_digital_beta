<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MovimentoEnvio;

class MovimentoEnvioFactory extends Factory
{
    protected $model = MovimentoEnvio::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'competencia_id' => $this->faker->numberBetween(1, 4),
            'atendimento' => $this->faker->numberBetween(0, 1),
            'title_id' => $this->faker->numberBetween(1, 3),
            'doc_anexo' => 'bootstrap-admin-dashboard-main.zip',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
