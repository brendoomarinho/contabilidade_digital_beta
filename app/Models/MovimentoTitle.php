<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentoTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}
