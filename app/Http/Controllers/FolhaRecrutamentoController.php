<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FolhaFuncionario;
use App\Models\FolhaRecrutamento;

class FolhaRecrutamentoController extends Controller {

    public function exameAdmissioanal(Request $request, $funcionario)
    {
        $validatedData = $request->validate([
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ]);

        DB::beginTransaction();

        try {
            $filename = $request->file('doc_anexo')->hashName();
            $request->file('doc_anexo')->storeAs('public/funcionarios_recrutamento_documentos', $filename);

            FolhaRecrutamento::where('funcionario_id', $funcionario)
                ->update([
                    'exame_admissao' => $filename,
                    'etapa' => 1,
                ]);

            DB::commit();

            return redirect()->back()->with([
                'successMessageTitle' => 'Enviado com sucesso!',
                'successMessageSubTitle' => 'Aguarde a aprovação do documento.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError('Falha ao processar o upload do arquivo: ' . $e->getMessage());
        }
    }

    public function contratoAssinado(Request $request, $funcionario)
    {
        $validatedData = $request->validate([
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ]);

        DB::beginTransaction();

        try {
            $filename = $request->file('doc_anexo')->hashName();
            $request->file('doc_anexo')->storeAs('public/funcionarios_recrutamento_documentos', $filename);

            FolhaRecrutamento::where('funcionario_id', $funcionario)
                ->update([
                    'contrato_assinado' => $filename,
                    'etapa' => 4,
                ]);

            DB::commit();

            return redirect()->back()->with([
                'successMessageTitle' => 'Enviado com sucesso!',
                'successMessageSubTitle' => 'Aguarde a aprovação do documento.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError('Falha ao processar o upload do arquivo: ' . $e->getMessage());
        }
    }

    public function avisoAssinado(Request $request, $funcionario)
    {
        $validatedData = $request->validate([
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ]);

        DB::beginTransaction();

        try {
            $filename = $request->file('doc_anexo')->hashName();
            $request->file('doc_anexo')->storeAs('public/funcionarios_recrutamento_documentos', $filename);

            FolhaRecrutamento::where('funcionario_id', $funcionario)
                ->update([
                    'aviso_assinado' => $filename,
                    'etapa' => 8,
                ]);

            DB::commit();

            return redirect()->back()->with([
                'successMessageTitle' => 'Enviado com sucesso!',
                'successMessageSubTitle' => 'Aguarde a aprovação do documento.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError('Falha ao processar o upload do arquivo: ' . $e->getMessage());
        }
    }

    public function exameDemissional(Request $request, $funcionario)
    {
        $validatedData = $request->validate([
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ]);

        DB::beginTransaction();

        try {
            $filename = $request->file('doc_anexo')->hashName();
            $request->file('doc_anexo')->storeAs('public/funcionarios_recrutamento_documentos', $filename);

            FolhaRecrutamento::where('funcionario_id', $funcionario)
                ->update([
                    'exame_demissao' => $filename,
                    'etapa' => 10,
                ]);

            DB::commit();

            return redirect()->back()->with([
                'successMessageTitle' => 'Enviado com sucesso!',
                'successMessageSubTitle' => 'Aguarde a aprovação do documento.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError('Falha ao processar o upload do arquivo: ' . $e->getMessage());
        }
    }

    public function rescisaoAssinada(Request $request, $funcionario)
    {
        $validatedData = $request->validate([
            'doc_anexo' => 'required|file|mimes:pdf,doc,png,jpg,rar,zip|max:50000',
        ], [
            'doc_anexo.max' => 'O tamanho máximo de cada arquivo é maior que o permitido.',
        ]);

        DB::beginTransaction();

        try {
            $filename = $request->file('doc_anexo')->hashName();
            $request->file('doc_anexo')->storeAs('public/funcionarios_recrutamento_documentos', $filename);

            FolhaRecrutamento::where('funcionario_id', $funcionario)
                ->update([
                    'termo_rescisao_assinado' => $filename,
                    'etapa' => 13,
                ]);

            DB::commit();

            return redirect()->back()->with([
                'successMessageTitle' => 'Enviado com sucesso!',
                'successMessageSubTitle' => 'Aguarde a aprovação do documento.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError('Falha ao processar o upload do arquivo: ' . $e->getMessage());
        }
    }
}