<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Movimento;
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
        $user_id = auth()->id();

        $validatedData = $request->validate( [
            'competencia_id' => 'required',
            'title_id' => 'required',
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'competencia_id.required' => 'Campo obrigatório.',
            'title_id.required' => 'Campo obrigatório.',
            'doc_anexo.required' => 'Anexo obrigatório.',
            'doc_anexo.file' => 'Arquivo anexado não é válido.',
            'doc_anexo.max' => 'Tamanho do arquivo anexado não pode exceder 50MB.',
            'doc_anexo.mimes' => 'Arquivo anexado deve ser do tipo PDF, DOC, PNG, JPG, RAR ou ZIP.',
        ]);

        if ($validatedData['doc_anexo']->isValid()) {

            $date = now()->format('d-m-Y'); 
            $filename = $user_id . '_' . $date . '_' . uniqid() . '.' . $validatedData['doc_anexo']->getClientOriginalExtension();

            $validatedData['doc_anexo']->storeAs('public/movimentos-mensais', $filename);

            $validatedData['doc_anexo'] = $filename;

            MovimentoEnvio::create(array_merge($validatedData, ['user_id' => $user_id]));

            $successMessageTitle = 'Movimento enviado com sucesso!';
            $successMessageSubTitle = 'Em breve o contador(a) confirmará o recebimento.';

            return redirect()->back()->with([
                'successMessageTitle' => $successMessageTitle,
                'successMessageSubTitle' => $successMessageSubTitle
            ]);
        } else {
            return redirect()->back()->withError('Falha ao processar o upload do arquivo.');
        }
    }


    public function destroy($id)
    {
        $destroyMovimento = MovimentoEnvio::findOrFail($id);
        $destroyMovimento->delete();
    }
}
