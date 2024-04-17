<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CertidaoEnvio;
use App\Services\ContagemDiasService;

class ClientCertidaoController extends Controller
{
    public function indexCertidoes(ContagemDiasService $contagemDiasService)
    {
        $user = auth->user();
      
        $registros = $user->certidaoEnvio()->with('certidaoTitle')->get();
      
        foreach ($registros as $registro) {
            $registro->dias_restantes = $contagemDiasService->calcularDiasRestantes($registro->dt_vencimento);
        }
       
        return view('page_clients.certidoes', ['registros' => $registros]);
    }
}
