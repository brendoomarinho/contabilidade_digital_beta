<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'cnpj',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token, $this->email, $this->name));
    }

    public function movimentoEnvios()
    {
        return $this->hasMany(MovimentoEnvio::class);
    }

    public function guiapagEnvios()
    {
        return $this->hasMany(GuiapagEnvio::class);
    }

    public function certidaoEnvios()
    {
        return $this->hasMany(CertidaoEnvio::class);
    }

    public function docRegulaEnvio()
    {
        return $this->hasMany(DocRegulaEnvio::class);
    }

    public function folhaFuncionario()
    {
        return $this->hasMany(FolhaFuncionario::class);
    }
}

