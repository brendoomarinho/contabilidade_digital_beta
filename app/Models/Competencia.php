<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'mes_id',
        'ano_id',
    ];

    public function mes()
    {
        return $this->belongsTo(CompetenciaMes::class, 'mes_id');
    }

    public function ano()
    {
        return $this->belongsTo(CompetenciaAno::class, 'ano_id');
    }

    public function movimentoEnvios()
    {
        return $this->hasMany(MovimentoEnvio::class);
    }

    public function guiapagEnvios() 
    {
        return $this->hasMany(GuiapagEnvios::class);
    }
}
