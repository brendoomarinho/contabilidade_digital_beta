<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FolhaFuncionario;

class FolhaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //garante que se chegou nessa no método então está autenticado
    }
    
    public function indexFuncionarios(){
        return view('page_clients.folha-funcionarios-index');
    }

    public function admissaoFuncionarios(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'dt_admissao' => 'required|date',
            'jornada' => 'required',
            'telefone' => 'required|string',
            'cpf' => 'required|string',
            'cargo' => 'required|string',
            'salario' => 'required|numeric',
            'modalidade' => 'required',
            'doc_anexo' => 'required|array',
            'doc_anexo.*' => 'file|mimes:pdf,doc,png,jpg,rar,zip',
        ]);
    
        $validatedData['user_id'] = auth()->id();
    
        $funcionario = FolhaFuncionario::create($validatedData);

        $fileNames = [];

        foreach ($request->file('doc_anexo') as $file) {

            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/documentos-admissao', $fileName);
            $fileNames[] = $fileName;
        }

        $funcionario->doc_anexo = json_encode($fileNames);

        $funcionario->save();
    
        $successMessageTitle = 'Solicitação aberta com sucesso!';
        $successMessageSubTitle = 'O processo de admissão foi iniciado.';

        return redirect()->back()->with([
            'successMessageTitle' => $successMessageTitle,
            'successMessageSubTitle' => $successMessageSubTitle
        ]);
    }
}