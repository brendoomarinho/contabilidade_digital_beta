<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\GuiapagEnvio;

class GuiapagNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $date;


    public function __construct(GuiapagEnvio $guiapagEnvio)
    {
        $this->message = 'Guia recebida no valor de'.$guiapagEnvio->valor;
        $this->date = date('H:i | d-m-Y');
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('guiapag'),
        ];
    }
}
