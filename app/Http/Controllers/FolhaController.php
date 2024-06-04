<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FolhaFuncionario;
use App\Models\FolhaPagamento;
use App\Models\CompetenciaAno;
use App\Models\CompetenciaMes;
use App\Models\Competencia;

class FolhaController extends Controller {


    public function indexPagamento() {

        $user = auth()->user();

        $registros = $user->folhaPagamento()->with('anoCompetencia', 'mesCompetencia')
        ->orderBy('ano_id', 'desc')
        ->orderBy('mes_id', 'desc')
        ->paginate(12);

        $anosCompetencia = CompetenciaAno::all();
    
        $mesesCompetencia = CompetenciaMes::all();

        return view('page_clients.folha-pagamento', [
            'registros' => $registros,
            'anosCompetencia' => $anosCompetencia,
            'mesesCompetencia' => $mesesCompetencia,
        ]);
    }

    public function indexFuncionario() {

        $user = auth()->user();

        $funcionarios = FolhaFuncionario::where( 'user_id', $user->id )->get();

        return view( 'page_clients.folha-funcionarios-index', compact( 'funcionarios' ) );
    }

    public function storeFuncionario( Request $request ) {

        $user_id = auth()->id();

        $validatedData = $request->validate([
            'nome' => 'required',
            'dt_admissao' => 'required|date',
            'jornada' => 'required',
            'telefone' => 'required|min:15|max:15', // Definindo tamanho mínimo e máximo para o telefone
            'cpf' => 'required|min:14|max:14',
            'cargo' => 'required',
            'salario' => 'required|min:6|max:10',
            'modalidade' => 'required',
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:250000',
        ], [
            'nome.required' => 'Campo obrigatório.',
            'dt_admissao.required' => 'Campo obrigatório.',
            'jornada.required' => 'Campo obrigatório.',
            'telefone.required' => 'Campo obrigatório.',
            'telefone.min' => 'Telefone inválido.',
            'telefone.max' => 'Telefone inválido.',
            'cpf.required' => 'Campo obrigatório.',
            'cpf.min' => 'CPF inválido.',
            'cpf.max' => 'CPF inválido.',
            'cargo.required' => 'Campo obrigatório.',
            'salario.required' => 'Campo obrigatório.',
            'salario.max' => 'Salário inválido.',
            'salario.min' => 'Salário inválido.',
            'modalidade.required' => 'Campo obrigatório.',
            'doc_anexo.required' => 'Documento(s) não anexado(s).',
            'doc_anexo.mimes' => 'O formato do arquivo deve ser pdf, doc, png, jpg, rar, zip.',
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior do que o permitido.',
        ]);
        
        try {

            DB::beginTransaction();

            $filename = $request->file( 'doc_anexo' )->hashName();
            $request->file( 'doc_anexo' )->storeAs( 'public/funcionarios_recrutamento_documentos', $filename );

            $valorSalario = str_replace( [ '.', ',' ], [ '', '.' ], $request->salario );

            $salarioDecimal = ( float ) $valorSalario;

            $funcionario = FolhaFuncionario::create( [
                'user_id' => $user_id,
                'nome' => $request->nome,
                'dt_admissao' => $request->dt_admissao,
                'jornada' => $request->jornada,
                'telefone' => $request->telefone,
                'cpf' => $request->cpf,
                'cargo' => $request->cargo,
                'salario' => $salarioDecimal, 
                'modalidade' => $request->modalidade,
                'doc_anexo' => $filename,
            ] );

            // Criação do registro em FolhaRecrutamento
            $funcionario->recrutamento()->create( [
                'etapa' => 0,
            ] );

            DB::commit();

            return redirect()->back()->with( [
                'successMessageTitle' => 'Processo de admissão iniciado!',
                'successMessageSubTitle' => 'O contador(a) está preparando o contrato.'
            ] );

        } catch ( \Exception $e ) {
            DB::rollback();

            return redirect()->back()->withError( $e->getMessage() );
        }
    }

    public function showRecrutamento( $id ) {

        $funcionario = FolhaFuncionario::with( 'recrutamento' )->findOrFail( $id );

        return view( 'page_clients.folha-recrutamento', compact( 'funcionario' ) );
    }
}