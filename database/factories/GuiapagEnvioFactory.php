<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\GuiapagEnvio;

class GuiapagEnvioFactory extends Factory
{
    protected $model = GuiapagEnvio::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'competencia_id' => $this->faker->numberBetween(1, 4),
            'rtf' => $this->faker->numberBetween(0, 1),
            'title_id' => $this->faker->numberBetween(1, 3),
            'valor' => $this->faker->numberBetween(152.00, 1500.00),
            'dt_venc' => '2024-03-17',
            'doc_anexo' => 'CF88_Livro_EC91_2016.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
