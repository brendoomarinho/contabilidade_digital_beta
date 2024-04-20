<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\DocRegulaEnvio;
use App\Services\ContagemDiasService;

class DocRegulatorioController extends Controller
{
    public function index(ContagemDiasService $contagemDiasService)
    {
        $user = auth()->user();
      
        $registros = $user->docRegulaEnvio()->with('docRegulaTitle')->get(); 
       
        foreach ($registros as $registro) {
            $registro->dias_restantes = $contagemDiasService->calcularDiasRestantes($registro->dt_venc);
        }

        return view('page_clients.doc_regulatorios', ['registros' => $registros]);
    }
}




