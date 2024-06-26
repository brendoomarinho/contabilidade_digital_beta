<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class ClientDashboardController extends Controller
{
    public function clearNotification(){
        
        $notification = Notification::query()->update(['seen' => 1]);

        return redirect()->back();
    }

    public function viewAllNotification(){
        
        $notification = Notification::query()->update(['seen' => 1]);

        return view('page_clients.notifications');
    }
}
