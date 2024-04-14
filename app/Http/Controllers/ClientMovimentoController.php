<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use Illuminate\Http\Request;
use App\Models\Competencia;
use App\Models\MovimentoTitle;
use App\Models\MovimentoEnvio;

class ClientMovimentoController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $registros = $user->movimentoEnvios()->with('competencia.mes', 'competencia.ano', 'movimentoTitle')
            ->orderBy('competencia_id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $competencias = Competencia::with(['mes', 'ano'])->get();

        $movimentoTitle = MovimentoTitle::all();

        return view('page_clients.movimentos', [
            'registros' => $registros,
            'competencias' => $competencias,
            'movimentoTitle' => $movimentoTitle
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Movimento $movimento)
    {
        //
    }

    public function edit(Movimento $movimento)
    {
        //
    }

    public function update(Request $request, Movimento $movimento)
    {
        //
    }

    public function destroy(Movimento $movimento)
    {
        //
    }
}
