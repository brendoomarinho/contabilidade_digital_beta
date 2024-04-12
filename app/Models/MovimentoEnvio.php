<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoEnvio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'competencia_id',
        'title_id',
        'atendimento',
        'doc_anexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }

    public function movimentoTitle()
    {
        return $this->belongsTo(movimentoTitle::class, 'title_id');
    }
}
