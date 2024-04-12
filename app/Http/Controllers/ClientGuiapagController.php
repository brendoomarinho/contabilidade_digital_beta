<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientGuiapagController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $registros = $user->guiaEnvios()->with('competencia.mes', 'competencia.ano', 'guiaLista')
            ->orderBy('competencia_id', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('clients.guiapag', ['registros' => $registros]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}