<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenciaMes extends Model
{
    use HasFactory;

    protected $table = 'competencia_meses';

    protected $fillable = [
        'mes',
    ];
}
