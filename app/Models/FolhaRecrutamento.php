<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaRecrutamento extends Model {
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'etapa',
        'atd',
        'exame_admissao',
        'contrato_original',
        'contrato_assinado',
        'ficha_cadastral',
        'rescisao_motivo',
        'dt_aviso',
        'reducao_jornada',
        'relato',
        'aviso_original',
        'aviso_assinado',
        'exame_demissao',
        'termo_rescisao_original',
        'termo_rescisao_assinado'
    ];

    public function funcionario()
    {
        return $this->belongsTo(FolhaFuncionario::class, 'funcionario_id');
    }
}

