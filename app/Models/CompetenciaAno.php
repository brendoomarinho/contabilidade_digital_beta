<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenciaAno extends Model
{
    use HasFactory;

    protected $fillable = [
        'ano',
    ];

    public function competencias()
    {
        return $this->hasMany(Competencia::class, 'ano_id');
    }
}
