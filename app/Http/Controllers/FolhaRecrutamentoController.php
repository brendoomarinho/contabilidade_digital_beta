<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FolhaFuncionario;
use App\Models\FolhaRecrutamento;

class FolhaRecrutamentoController extends Controller {

    public function etapa1( Request $request, $funcionario ) {
        
        $user_id = auth()->id();

        $validatedData = $request->validate( [

            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ] );

        if ( $validatedData[ 'doc_anexo' ]->isValid() ) {

            $filename = $user_id . '_' . now()->format( 'd-m-Y' ) . '_' . uniqid() . '.' . $validatedData[ 'doc_anexo' ]->getClientOriginalExtension();

            $validatedData[ 'doc_anexo' ]->storeAs( 'public/funcionarios_recrutamento_documentos', $filename );

            $funcionario = FolhaRecrutamento::create( [
                'user_id' => $user_id,
                'exame_admissao' => $filename,
                'funcionario_id' => $funcionario, 
                'etapa' => 1,
            ] );

            $successMessageTitle = 'Processo de admissão iniciado!';
            $successMessageSubTitle = 'O contador(a) está preparando o contrato.';

            return redirect()->back()->with( [
                'successMessageTitle' => $successMessageTitle,
                'successMessageSubTitle' => $successMessageSubTitle
            ] );
        } else {
            return redirect()->back()->withError( 'Falha ao processar o upload do arquivo.' );
        }
    }

}