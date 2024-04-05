<?php

namespace App\Models\ClientModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoModel extends Model
{
    use HasFactory;

    protected $table = 'movimentos_titles';

    protected $fillable = [
        'title_movimento',
    ];
}
