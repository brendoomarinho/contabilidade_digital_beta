<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiapagTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function guiapagEnvios()
    {
        return $this->hasMany(GuiapagEnvios::class);
    }
}
