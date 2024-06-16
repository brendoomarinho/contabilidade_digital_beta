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


    public function indexFolhaPagamento() 
    {
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

    public function storeFolhaPagamento(Request $request)
    {
        $rules = [
            'ano' => 'required',
            'mes' => 'required',
            'doc_anexo' => 'required|file|mimes:pdf,doc,xlsx|max:2048', // Limitado a 2MB
        ];

        $messages = [
            'ano.required' => 'Campo obrigatório.',
            'mes.required' => 'Campo obrigatório.',
            'doc_anexo.required' => 'Anexo obrigatório.',
            'doc_anexo.mimes' => 'Formato deve ser .pdf, .doc ou .xlsx',
            'doc_anexo.max' => 'Documento excede tamanho permitido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->after(function ($validator) use ($request) {
            $ano = $request->input('ano');
            $mes = $request->input('mes');
            $user_id = auth()->id();

            $existingRecord = FolhaPagamento::where('user_id', $user_id)
                ->where('mes_id', $mes)
                ->where('ano_id', $ano)
                ->exists();

            if ($existingRecord) {
                $validator->errors()->add('mes', 'Competência já informada!');
            }
        });

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!$request->hasFile('doc_anexo')) {
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao processar a solicitação. Por favor, tente novamente.']);
        }

        try {
            $doc_anexo = $request->file('doc_anexo');

            $user_id = auth()->id();
            $timestamp = now()->format('dmY_His');
            $extension = $doc_anexo->getClientOriginalExtension();
            $fileName = "resumo_{$user_id}_{$timestamp}.{$extension}";

            $doc_anexo->storeAs('folha_pagamento/resumos', $fileName, 'public');

            $folhaPagamento = FolhaPagamento::create([
                'user_id' => $user_id,
                'atd' => false,
                'retificador' => false,
                'mes_id' => $request->input('mes'),
                'ano_id' => $request->input('ano'),
                'recebido' => false,
                'anexo_resumo' => $fileName,
            ]);

            return redirect()->back()->with([
                'successMessageTitle' => 'Enviado com sucesso!',
                'successMessageSubTitle' => 'Aguarde! Em breve, sua folha será calculada.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao processar a solicitação. Por favor, tente novamente.']);
        }
    }


    public function deleteFolhaPagamento($id)
    {
        try {
            $folhaPagamento = FolhaPagamento::findOrFail($id);

            $filename = $folhaPagamento->anexo_resumo;

            $folhaPagamento->delete();

            if ($filename) {
                Storage::disk('public')->delete('folha_pagamento/resumos/' . $filename);
            }

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o registro de folha de pagamento.');
        }
    }

    public function indexFuncionario() 
    {
        $user = auth()->user();

        $funcionarios = FolhaFuncionario::where( 'user_id', $user->id )->get();

        return view( 'page_clients.folha-funcionarios-index', compact( 'funcionarios' ) );
    }

    public function storeFuncionario( Request $request ) 
    {
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