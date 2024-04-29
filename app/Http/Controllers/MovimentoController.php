<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Movimento;
use Illuminate\Http\Request;
use App\Models\Competencia;
use App\Models\MovimentoTitle;
use App\Models\MovimentoEnvio;

class MovimentoController extends Controller
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'competencia_id' => 'required',
            'title_id' => 'required',
            'doc_anexo' => 'required|array',
            
        ], [
            'competencia_id.required' => 'Competência é obrigatório.',
            'title_id.required' => 'Descrição é obrigatório.',
            'doc_anexo.required' => 'Anexo obrigatório.',
            'doc_anexo.file' => 'Arquivo anexado não é válido.',
            'doc_anexo.max' => 'Tamanho do arquivo anexado não pode exceder 50MB.',
            'doc_anexo.mimes' => 'Arquivo anexado deve ser do tipo PDF, ZIP, ou 7Z.',
            '*' => 'Falha em anexar o arquivo.',
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
        
        $successMessageTitle = 'Movimento enviado com sucesso!';
        $successMessageSubTitle = 'Em breve o contador(a) confirmará o recebimento.';

        return redirect()->back()->with([
            'successMessageTitle' => $successMessageTitle,
            'successMessageSub' => $successMessageSubTitle
        ]);    
    }


    public function destroy($id)
    {
        $destroyMovimento = MovimentoEnvio::findOrFail($id);
        $destroyMovimento->delete();
    }
}



