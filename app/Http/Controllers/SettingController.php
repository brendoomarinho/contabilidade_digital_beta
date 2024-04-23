<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\SettingsService;
use App\Models\Setting;

class SettingController extends Controller
{ 
    function UpdatePusherSetting(Request $request) : RedirectResponse {
        $validateData = $request->validate([
            'pusher_app_id' => ['required'],
            'pusher_key' => ['required'],
            'pusher_secret' => ['required'],
            'pusher_cluster' => ['required'],
        ]);
        
        foreach($validateData as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        
        $successMessage = 'Suas credenciais PUSHER foram atualizadas.';

        return redirect()->back()->with('successMessage', $successMessage);

        }
}
