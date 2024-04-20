<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocRegulaTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'orgao',
    ];

    public function docRegulaEnvios()
    {
        return $this->hasMany(DocRegulaEnvio::class);
    }
}
