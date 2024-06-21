<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaMensagem extends Model
{
    use HasFactory;

    protected $table = 'folha_mensagens';

    protected $fillable = [
        'folha_id',
        'atd',
        'user_id',
        'user_admin_id',
        'remetente_id',
        'mensagem',
        'doc_anexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userAdmin()
    {
        return $this->belongsTo(User::class, 'user_admin_id');
    }

    public function folhaPagamento()
    {
        return $this->belongsTo(FolhaPagamento::class, 'folha_id');
    }
}
