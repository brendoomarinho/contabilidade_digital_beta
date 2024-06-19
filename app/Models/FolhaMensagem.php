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
        'sender_id',
        'recipient_id',
        'message',
        'doc_anexo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function folhaPagamento()
    {
        return $this->belogsTo(FolhaPagamento::class);
    }
}
