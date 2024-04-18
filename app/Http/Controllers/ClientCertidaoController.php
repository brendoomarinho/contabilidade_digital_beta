<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CertidaoEnvio;
use App\Services\ContagemDiasService;

class ClientCertidaoController extends Controller
{
    public function index(ContagemDiasService $contagemDiasService)
    {
        $user = auth()->user();
      
        $registros = $user->certidaoEnvios()->with('certidaoTitle')->get();
      
        foreach ($registros as $registro) {
            $registro->dias_restantes = $contagemDiasService->calcularDiasRestantes($registro->dt_venc);
        }
       
        return view('page_clients.certidoes', ['registros' => $registros]);
    }
}
