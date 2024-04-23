<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GuiapagNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $guiapag;

    /**
     * Create a new event instance.
     */
    public function __construct($guiapag)
    {
        $this->setConfig();

        $this->guiapag = $guiapag;
    }

    function setConfig() {
        config(['broadcasting.connections.pusher.key' => config('settings.pusher_key')]);
        config(['broadcasting.connections.pusher.secret' => config('settings.pusher_secret')]);
        config(['broadcasting.connections.pusher.app_id' => config('settings.pusher_app_id')]);
        config(['broadcasting.connections.pusher.options.cluster' => config('settings.pusher_cluster')]);
        dd(config('broadcasting'));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('guiapag'),
        ];
    }
}
