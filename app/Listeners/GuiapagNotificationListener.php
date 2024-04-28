<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Notification;
use App\Events\GuiapagNotificationEvent;

class GuiapagNotificationListener
{
    public function __construct()
    {
        //
    }

    public function handle(GuiapagNotificationEvent $event): void
    {
        $notification = new Notification();
        
        $notification->message = $event->message;
        $notification->save();
    }
}
