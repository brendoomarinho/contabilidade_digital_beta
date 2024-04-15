<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    public $email;
    public $name;

    public function __construct($token, $email, $name)
    {
       $this->token = $token;
       $this->email = $email;
       $this->name = $name;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        $url = 'http://localhost:8000/reset-password/'.$this->token.'?email='.$this->email;
        $saudacao = 'Olá! '. $this->name. '.';
        return (new MailMessage)
            ->subject('Recuperação de senha')
            ->greeting($saudacao)
            ->line('Clique no botão abaixo para redefinir sua senha. Caso você não tenha feito esta solicitação, apenas ignore este email.')
            ->action('Redefinir senha', $url)
            ->salutation('Suporte técnico.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
