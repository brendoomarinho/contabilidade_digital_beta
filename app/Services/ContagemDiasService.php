<?php

namespace App\Services;

use Carbon\Carbon;

class ContagemDiasService
{
    public function calcularDiasRestantes($dataVencimento)
    {
        $dataAtual = Carbon::now()->startOfDay();
        $dataVencimento = Carbon::parse($dataVencimento)->startOfDay();
        $diferencaDias = $dataAtual->diffInDays($dataVencimento, false);

        if ($diferencaDias < 0) {
            return '0';
        }

        return $diferencaDias;
    }
}