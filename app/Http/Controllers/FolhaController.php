<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FolhaFuncionario;

class FolhaController extends Controller {

    public function indexFuncionarios() {

        $user = auth()->user();
        $funcionarios = FolhaFuncionario::where( 'user_id', $user->id )->get();

        return view( 'page_clients.folha-funcionarios-index', compact( 'funcionarios' ) );
    }

    public function admissaoFuncionarios( Request $request ) {

        $user_id = auth()->id();

        $validatedData = $request->validate( [
            'nome' => 'required',
            'dt_admissao' => 'required|date',
            'jornada' => 'required',
            'telefone' => 'required',
            'cpf' => 'required',
            'cargo' => 'required',
            'salario' => 'required',
            'modalidade' => 'required',
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000', 
        ], [
            'nome.required' => 'Campo obrigatório.',
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ] );

        if ($validatedData['doc_anexo']->isValid()) {
        
            $date = now()->format('d-m-Y'); 
            $filename = $user_id . '_' . $date . '_' . uniqid() . '.' . $validatedData['doc_anexo']->getClientOriginalExtension();
      
            $validatedData['doc_anexo']->storeAs('public/funcionarios-admissao', $filename);

            $validatedData['doc_anexo'] = $filename;
            
            FolhaFuncionario::create(array_merge($validatedData, ['user_id' => $user_id]));

            $successMessageTitle = 'Processo de admissão iniciado!';
            $successMessageSubTitle = 'O contador(a) está preparando o contrato.';

            return redirect()->back()->with([
                'successMessageTitle' => $successMessageTitle,
                'successMessageSubTitle' => $successMessageSubTitle
            ]);
            
        } else {
            return redirect()->back()->withError('Falha ao processar o upload do arquivo.');
        }
    }

    public function contratosFuncionarios($funcionario){
        return view('page_clients.folha-funcionarios-contratos');
    }
}