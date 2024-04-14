<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiapagEnvio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_id',
        'competencia_id',
        'valor',
        'dt_venc',
        'rtf',
        'doc_anexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }
    
    public function guiapagTitle()
    {
        return $this->belongsTo(GuiapagTitle::class, 'title_id');
    }
}
