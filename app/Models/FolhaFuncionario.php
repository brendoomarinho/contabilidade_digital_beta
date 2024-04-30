<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaFuncionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'atd',
        'nome',
        'cpf',
        'dt_admissao',
        'cargo',
        'jornada',
        'salario',
        'telefone',
        'modalidade',
        'doc_anexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



