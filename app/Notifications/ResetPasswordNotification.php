<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $url)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->markdown('vendor.notifications.email')
            ->subject('Recuperação de senha')
            ->greeting('Equipe de suporte,')
            ->salutation('Suporte técnico.')
            ->from('contato@contactcontabilidade.com')
            ->line('Olá, você solicitou a redefinição de senha, clique no botão abaixo para prosseguir com a solicitação.')
            ->action('Redefinir senha', url($this->url))
            ->line('Caso você não tenha solicitado a recuperação de senha, desconsidere este email!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
