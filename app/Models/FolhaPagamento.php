<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaPagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'atd',
        'retificador',
        'recebido',
        'ano_id',
        'mes_id',
        'dt_retificador',
        'valor',
        'extrato',
        'recibos',
        'anexo_resumo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }

    public function anoCompetencia()
    {
        return $this->belongsTo(CompetenciaAno::class, 'ano_id');
    }

    public function mesCompetencia()
    {
        return $this->belongsTo(CompetenciaMes::class, 'mes_id');
    }

}