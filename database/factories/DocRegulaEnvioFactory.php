<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DocRegulaEnvio;

class DocRegulaEnvioFactory extends Factory
{
    protected $model = DocRegulaEnvio::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'title_id' => $this->faker->numberBetween(1, 4),
            'dt_venc' => $this->faker->dateTimeBetween('now', '+6 months'),
            'doc_anexo' => 'doc_regulatorio.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
