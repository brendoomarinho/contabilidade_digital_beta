<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

        $movimentoTitles = MovimentoTitle::all();

        return view('page_clients.movimentos', [
            'registros' => $registros,
            'competencias' => $competencias,
            'movimentoTitles' => $movimentoTitles
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'competencia_id' => 'required',
            'title_id' => 'required',
            'doc_anexo' => 'required|file|max:51200|mimes:pdf,zip,7z',
        ], [
            'competencia_id.required' => 'O campo competência é obrigatório.',
            'title_id.required' => 'O campo tipo de movimento é obrigatório.',
            'doc_anexo.required' => 'O campo anexo é obrigatório.',
            'doc_anexo.file' => 'O arquivo anexado não é válido.',
            'doc_anexo.max' => 'O tamanho do arquivo anexado não pode exceder 50MB.',
            'doc_anexo.mimes' => 'O arquivo anexado deve ser do tipo PDF, ZIP, ou 7Z.',
            '*' => 'Formato de arquivo inválido ou corrompido.',
        ]);
        
        $doc_anexo = $request->file('doc_anexo');
        
        if ($doc_anexo) {
            $originalName = $doc_anexo->getClientOriginalName();
            $doc_anexo->storeAs('movimentos_mensais', $originalName, 'public');
        } else {
            $originalName = null;
        }
        
        MovimentoEnvio::create([
            'user_id' => auth()->id(),
            'competencia_id' => $validatedData['competencia_id'],
            'title_id' => $validatedData['title_id'],
            'atendimento' => $request->input('atendimento'),
            'doc_anexo' => $originalName,
        ]);
        
        $successMessage = 'Enviado com sucesso! Em breve seu contador(a) confirmará o recebimento.';
        
        return redirect()->back()->with('successMessage', $successMessage);        
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



