<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CertidaoEnvio;

class CertidaoEnvioFactory extends Factory
{
    protected $model = CertidaoEnvio::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'title_id' => $this->faker->numberBetween(1, 3),
            'dt_venc' => $this->faker->dateTimeBetween('now', '+6 months'),
            'doc_anexo' => 'certidao.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
