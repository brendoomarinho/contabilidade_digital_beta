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
}
