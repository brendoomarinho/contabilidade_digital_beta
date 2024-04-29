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

        // Recupera os registros da Folha de Funcionários pertencentes ao usuário logado, com apenas os campos desejados
        $funcionarios = FolhaFuncionario::where( 'user_id', $user->id )
        ->select( 'nome', 'cpf', 'dt_admissao', 'salario', 'cargo', 'telefone', 'modalidade', 'id' )
        ->get();

        // Passa os dados para a view 'page_clients.folha-funcionarios-index'
        return view( 'page_clients.folha-funcionarios-index', compact( 'funcionarios' ) );
    }

    public function admissaoFuncionarios( Request $request ) {
        $validatedData = $request->validate( [
            'nome' => 'required',
            'dt_admissao' => 'required|date',
            'jornada' => 'required',
            'telefone' => 'required',
            'cpf' => 'required',
            'cargo' => 'required',
            'salario' => 'required',
            'modalidade' => 'required',
            'doc_anexo' => 'required|array',
            'doc_anexo.*' => 'file|mimes:pdf,doc,png,jpg,rar,zip|max:20000', // Limite de 50 MB
        ], [
            'doc_anexo.*.max' => 'O tamanho máximo de cada arquivo é 20 MB.',
        ] );

        $validatedData[ 'user_id' ] = auth()->id();

        $anexos = [];
        if ( $request->hasFile( 'doc_anexo' ) ) {
            foreach ( $request->file( 'doc_anexo' ) as $file ) {
                if ( $file->isValid() ) {
                    $path = $file->store( 'anexos' );
                    $anexos[] = $path;
                } else {
                    return redirect()->back()->withError( 'Falha ao processar o upload dos arquivos.' );
                }
            }
        }

        $validatedData[ 'doc_anexo' ] = json_encode( $anexos );

        $funcionario = FolhaFuncionario::create( $validatedData );

        $successMessageTitle = 'Solicitação aberta com sucesso!';
        $successMessageSubTitle = 'O processo de admissão foi iniciado.';

        return redirect()->back()->with( [
            'successMessageTitle' => $successMessageTitle,
            'successMessageSubTitle' => $successMessageSubTitle
        ] );
    }

    public function contratosFuncionarios($funcionario){
        return view('page_clients.folha-funcionarios-contratos');
    }
}