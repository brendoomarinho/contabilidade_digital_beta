<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocRegulaEnvio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_id',
        'doc_anexo',
        'dt_venc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function docRegulaTitle()
    {
        return $this->belongsTo(DocRegulaTitle::class, 'title_id');
    }
}

