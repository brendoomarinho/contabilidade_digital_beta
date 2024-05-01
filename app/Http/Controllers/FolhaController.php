<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FolhaFuncionario;

class FolhaController extends Controller {

    public function indexFuncionario()  {
        
        $user = auth()->user();

        $funcionarios = FolhaFuncionario::where( 'user_id', $user->id )->get();

        return view( 'page_clients.folha-funcionarios-index', compact( 'funcionarios' ) );
    }

    public function storeFuncionario(Request $request) {
    
        $user_id = auth()->id();
    
        $validatedData = $request->validate([
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
        ]);
    
        try {
            // Inicia uma transação de banco de dados
            DB::beginTransaction();
    
            // Upload de arquivos
            if ($validatedData['doc_anexo']->isValid()) {
                $filename = $request->file('doc_anexo')->store('public/funcionarios-admissao');
            } else {
                throw new \Exception('Falha ao processar o upload do arquivo.');
            }
    
            // Criação do registro em FolhaFuncionario
            $funcionario = FolhaFuncionario::create([
                'user_id' => $user_id,
                'nome' => $request->nome,
                'dt_admissao' => $request->dt_admissao,
                'jornada' => $request->jornada,
                'telefone' => $request->telefone,
                'cpf' => $request->cpf,
                'cargo' => $request->cargo,
                'salario' => $request->salario,
                'modalidade' => $request->modalidade,
                'doc_anexo' => $filename,
            ]);
    
            // Criação do registro em FolhaRecrutamento
            $funcionario->recrutamento()->create([
                'etapa' => 1,
                // Outros campos que você precisa definir aqui
            ]);
    
            // Confirma a transação se todas as operações forem bem-sucedidas
            DB::commit();
    
            // Resposta de sucesso
            return redirect()->back()->with([
                'successMessageTitle' => 'Processo de admissão iniciado!',
                'successMessageSubTitle' => 'O contador(a) está preparando o contrato.'
            ]);
            
        } catch (\Exception $e) {
            // Desfaz a transação em caso de falha
            DB::rollback();
    
            // Retorna para a página anterior com uma mensagem de erro
            return redirect()->back()->withError($e->getMessage());
        }
    }
    
    

    public function showRecrutamento($id)
    {
        // Encontrar o funcionário pelo ID
        $funcionario = FolhaFuncionario::with('recrutamento')->findOrFail($id);
        
        // Passar o funcionário para a view e retornar a view
        return view('page_clients.folha-recrutamento', compact('funcionario'));
    }
}