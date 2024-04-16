<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertidaoTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'orgao',
    ];

    public function certidaoEnvio()
    {
        return $this->hasMany(CertidaoEnvio::class);
    }
}
