<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertidaoEnvio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_id',
        'dt_venc',
        'doc_anexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function certidaoTitle()
    {
        return $this->belongsTo(CertidaoTitle::class, 'title_id');
    }
}





