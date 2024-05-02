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

        $validatedData = $request->validate( [

            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ] );

        if ( $validatedData[ 'doc_anexo' ]->isValid() ) {
            $filename = $request->file( 'doc_anexo' )->store( 'public/funcionarios_recrutamento_documentos' );

            FolhaRecrutamento::where( 'funcionario_id', $funcionario )
                ->update([
                    'exame_admissao' => $filename,
                    'etapa' => 1,
                ]);

        } else {
            return redirect()->back()->withError( 'Falha ao processar o upload do arquivo.' );
        }

        $successMessageTitle = 'Enviado com sucesso!';
        $successMessageSubTitle = 'Aguarde a aprovação do documento.';

        return redirect()->back()->with( [
            'successMessageTitle' => $successMessageTitle,
            'successMessageSubTitle' => $successMessageSubTitle
        ] );
    }

    
}